<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PromoteUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'promote:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
//        DB::beginTransaction();
        //Attach upline to new users & promote assert level 1 condition
        $this->handleFreshUsers();

        //performs upgrade for users in level 1-2
        $this->advanceUserLevel();
    }

    protected function levelUp(User &$user, $to)
    {
        if($to == 1) {
            $user->level_id = $to;
            $user->level_assert = 0;
        }
        elseif($to == 2) {
            $user->level_id = $to;
            $user->level_assert = 1;
        }
        elseif($to == 3){
            $user->level_id = $to;
            $user->level_assert = 2;
        }

        $user->save();
    }

    /**
     * Level requirement
     * @param User $user
     * @return int
     */
    static protected function reqMatch(User &$user)
    {
        return 5 - User::where('upline_id', $user->id)->get()->count();
    }

    /**
     * Confirm what level user is
     * @param User $user
     * @return int
     */
    protected function assertLevel(User &$user)
    {
        switch($user){
            case $user->level_id == 1 && $user->level_assert === 0:
                return 1;
                break;

            case $user->level_id == 2 && $user->level_assert == 1:
                return 2;
                break;

            case ($user->level_id == 3 && $user->level_assert == 2)
                || ($user->level_id == 3 && $user->level_assert == 3):
                return 3;
                break;

            case is_null($user->level_id) && $user->payment:
                return 0;
                break;

            default:
                return -1;
        }
    }

    /**
     * This handles all new users
     * perform attaching user to an upline
     */
    protected function handleFreshUsers()
    {
        $LZUNoUpline = function (User &$user) {
            return User::where(function ($query) use ($user) {
                $query->wherePayment(1)
                    ->whereNull('upline_id')
                    ->whereNotIn('id', [1, $user->id]);
            })->get();
        };

        $recallUser = function () {
            return User::where(function ($query) {
                $query->wherePayment(1)
                    ->whereNotNull('upline_id')
                ->whereNull('level_assert')
                    ->whereNotIn('id', [1]);
            })->get();
        };

        $reset = false;
        while($recallUser()->count() && !$reset){
            $this->info("recallUser: ".$recallUser()->count());
            foreach ($recallUser() as &$LZUU) {
//            $this->info($this->reqMatch($LZUU));
                $assertLevel = $this->assertLevel($LZUU);
                if ($assertLevel == 0) {
//                    $reqMatch = $this->reqMatch($LZUU);
                    $reqMatch = static::reqMatch($LZUU);
                    $users = $LZUNoUpline($LZUU);
                    $this->info("recallUser in Loop: ".$recallUser()->count());
                    $this->info("LZUNoUpline: ".$users->count());
                    if(!$users->count()) {
                        $reset = true;
                        $this->info("While Loop HALT!");
                        break;
                    }
                    for ($i = 0; $i < $reqMatch; $i++) {
                        if (!$users->count())
                            break;
                        $singleU = $users->shift();
                        $singleU->upline_id = $LZUU->id;
                        $singleU->save();
                    }

//                    if ($this->reqMatch($LZUU) == 0) {
                    if (static::reqMatch($L8ZUU) == 0) {
                        $this->levelUp($LZUU, 1);
                    }
                } elseif($assertLevel == -1) {
                    $this->info("Assert Level: ". $assertLevel);
                    $reset = true;
                }
            }
        }
    }

    /**
     * Recursive check downline users
     * @param $user
     * @param $steps
     * @param $loop
     * @return int
     */
    static public function stepCheck(&$user, &$steps, $loop)
    {
        if($loop == 0)
            return $steps;

        $DLUsers = function (User &$user) {
            return User::where(function ($query) use(&$user) {
                $query->where('upline_id', $user->id)
                    ->wherePayment(1)
                    ->whereNotIn('id', [1, $user->id]);
            })->get();
        };

        //get Downline users
        $dlUsers = $DLUsers($user);
        foreach ($dlUsers as &$DLU) {
//            if ($this->reqMatch($DLU) == 0) {
            if (static::reqMatch($DLU) == 0) {
                $steps += 5;
//                $this->stepCheck($DLU, $steps, $loop-1);
                static::stepCheck($DLU, $steps, $loop-1);
            }
        }

        return $steps;
    }


    /**
     * Advance user level based on downlines requirement
     */
    protected function advanceUserLevel()
    {
        $users = User::where(function ($query) {
            $query->whereNotNull('upline_id')
                ->whereNotNull('level_id')
                ->whereNotNull('level_assert')
                ->wherePayment(1)
                ->whereNotIn('id', [1]);
        })->get();

        foreach ($users as &$user) {
            $steps = 0;
            $assertLevel = $this->assertLevel($user);
            if ($assertLevel == 1) {
//                if ($this->reqMatch($user) == 0) {
                if (static::reqMatch($user) == 0) {
//                    $this->stepCheck($user, $steps, 1);
                    static::stepCheck($user, $steps, 1);
                    $this->info("1L:{$user->id} | SU:{$steps} "); //SU->Steps-users //1L -> Level 1
                    if ($steps == 25) {
                        $this->levelUp($user, 2);
                    }
                }
            } elseif ($assertLevel == 2) {
                $steps = 0;
//                if ($this->reqMatch($user) == 0) {
                if (static::reqMatch($user) == 0) {
//                    $this->stepCheck($user, $steps, 2);
                    static::stepCheck($user, $steps, 2);
                    $this->info("2L:{$user->id} | SU:{$steps} "); //SU->Steps-users //1L -> Level 1
                    if ($steps >= 125) {
                        $this->levelUp($user, 3);
                    }
                }
            }
        }
    }
}
