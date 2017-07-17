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
        $this->handleFreshUsers();


    }

    protected function reqMatch(User &$user)
    {
        return 5 - User::where('upline_id', $user->id)->get()->count();
    }

    /**
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
     * @param $LZUU
     * @return mixed
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
                    $reqMatch = $this->reqMatch($LZUU);
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

                    if ($this->reqMatch($LZUU) == 0) {
                        $LZUU->level_assert = 0;
                        $LZUU->level_id = 1;
                        $LZUU->save();
//                    $this->info($this->reqMatch($LZUU));
                    }
                } elseif($assertLevel == -1) {
                    $this->info("Assert Level: ". $assertLevel);
                    $reset = true;
                }
            }
        }
    }
}
