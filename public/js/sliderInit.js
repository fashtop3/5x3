$(document).ready(function() {

			$(".bose").bose({
				images : [ "img/slider-01.jpg", "img/slider-02.jpg", "img/slider-03.jpg"],
				imageTitles: [
					['Title 1', 'Description one here'],
					['Title 2', 'Description two here'],
					['Title 3', 'Description three here']
				],
				imageAttributes: [
					/*
          {'border': '1px solid #ff0000', 'boxShadow': '0 0 5px rgba(0, 0, 0, 0.2)'},
					{'border': '1px solid #ff0000', 'boxShadow': '0 0 5px rgba(0, 0, 0, 0.2)'},
					{'border': '1px solid #ff0000', 'boxShadow': '0 0 5px rgba(0, 0, 0, 0.2)'}
          */
				],
				onComplete : function(){
					console.log("Trigger onComplete!");
				},
				onSlideStart : function(index){
					console.log(index + ' destroying');
				},
				onSlideEnd : function(index){
					console.log(index + ' showed');
				},
				onPause : function(index){
					console.log('Paused');
				},
				pagination : { show : false, container : '.bose-pagination', text : false },
				thumbs : { show : false, container : '.bose-thumbs', dimension : { width : 150, height: 70 }, text : true },
				responsive : true,
				autofit : false
			});

			$('.play').click(function(){
				$(".bose").bose('play');
			});

			$('.pause').click(function(){
				$(".bose").bose('pause');
			});

			$('.previous').click(function(){
				$(".bose").bose('previous');
			});

			$('.next').click(function(){
				$(".bose").bose('next');
			});

		});