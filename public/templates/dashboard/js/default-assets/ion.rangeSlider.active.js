!function(e){"use strict";e("#js-range-slider").ionRangeSlider({type:"double",min:0,max:1e3,from:200,to:500,grid:!0}),e("#demo_1").ionRangeSlider({type:"double",grid:!0,min:0,max:1e3,from:200,to:800,prefix:"تومان"}),e("#demo_2").ionRangeSlider({type:"double",grid:!0,min:-1e3,max:1e3,from:-500,to:500}),e("#demo_3").ionRangeSlider({type:"double",grid:!0,min:-1e3,max:1e3,from:-500,to:500,step:250}),e("#demo_4").ionRangeSlider({type:"double",grid:!0,min:-12.8,max:12.8,from:-3.2,to:3.2,step:.1});var i=[0,10,100,1e3,1e4,1e5,1e6],r=i.indexOf(10),n=i.indexOf(1e4);e("#demo_5").ionRangeSlider({type:"double",grid:!0,from:r,to:n,values:i}),e("#demo_6").ionRangeSlider({grid:!0,from:(new Date).getMonth(),values:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]}),e("#demo_7").ionRangeSlider({skin:"big",grid:!0,min:1e3,max:1e6,from:1e5,step:1e3,prettify_enabled:!0,prettify_separator:","}),e("#demo_8").ionRangeSlider({skin:"big",grid:!0,min:1,max:1e3,from:100,prettify:function(e){return e+" → "+ +Math.log2(e).toFixed(3)}}),e("#demo_9").ionRangeSlider({grid:!0,min:0,max:100,from:50,step:5,max_postfix:"+",prefix:"تومان"}),e("#demo_10").ionRangeSlider({skin:"round",grid:!0,min:0,max:100,from:21,max_postfix:"+",prefix:"Age: ",postfix:" years"}),e(".js-range-slider-1").ionRangeSlider({skin:"modern"}),e(".js-range-slider-2").ionRangeSlider({skin:"sharp"}),e(".js-range-slider-3").ionRangeSlider({skin:"round"}),e(".js-range-slider-4").ionRangeSlider({skin:"square"})}(jQuery);