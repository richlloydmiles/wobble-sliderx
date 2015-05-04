<?php
/**
 * This is the content for the wxslides shortcode
 **/
$t_id =  get_term_by('slug', $a['slug'], 'wxsliders')->term_id;
$term_meta = get_option( "taxonomy_term_$t_id" );
extract((array) $term_meta);
query_posts( array( 'post_type' => 'product' , 'wxsliders' => $a['slug'] ) );?>
<script>   
	function loadjscssfile(filename, filetype){
    if (filetype=="js"){ //if filename is a external JavaScript file
    	var fileref=document.createElement('script')
    	fileref.setAttribute("type","text/javascript")
    	fileref.setAttribute("src", filename)
    }
    else if (filetype=="css"){ //if filename is an external CSS file
    	var fileref=document.createElement("link")
    	fileref.setAttribute("rel", "stylesheet")
    	fileref.setAttribute("type", "text/css")
    	fileref.setAttribute("href", filename)
    }
    if (typeof fileref!="undefined")
    	document.getElementsByTagName("head")[0].appendChild(fileref)
}
jQuery(document).ready(function($) {

	loadjscssfile("//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css", "css"); 
});
</script>

<style>
	.background-img {
		width: 100%;
		/*set the height to a fix value*/
		background-repeat: no-repeat;
		/*set the focal point*/
		background-position: top;
		background-size: cover;
	}	
	.bx-wrapper .bx-controls-direction a {
		text-indent: 0!important;
	}
	.bx-wrapper .bx-next ,
	.bx-wrapper .bx-prev{
		background: none!important;
	}
	.wxchev {
		font-size: 38px;
	}

	.bx-wrapper .bx-next {
		right:0!important;
	}
</style>
<?php 
if (!isset($wxslider_chevron_left) || empty( $wxslider_chevron_left) || $wxslider_chevron_left =='<br />') { $wxslider_chevron_left = 'fa-angle-left';  }
if (!isset($wxslider_chevron_right) || empty( $wxslider_chevron_right) || $wxslider_chevron_right =='<br />') { $wxslider_chevron_right = 'fa-angle-right';  }
if (!isset($wxslider_height) || empty( $wxslider_height) || $wxslider_height =='<br />') { $wxslider_height = '260';  }
if (!isset($wxslider_number) || empty( $wxslider_number) || $wxslider_number =='<br />') { $wxslider_number = '1';  }
?>
<ul class="bxslider" style="padding:0;margin:0;">
	<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();?>
	<li><div class="background-img" style="height:<?php echo $wxslider_height; ?>px;background-image:url('<?php echo wp_get_attachment_image_src( get_post_meta( get_the_ID(), 'image_field', TRUE ), 'full' )[0]; ?>');">
		<?php echo get_post_meta( get_the_ID(), 'content_field', TRUE ); ?>
	</div>
</li>
<?php endwhile; endif; wp_reset_query(); 
?>
</ul>

<script>
	jQuery(document).ready(function($) {
		jQuery('.bxslider').bxSlider({
			nextText: '<i class="fa wxchev <?php echo $wxslider_chevron_right; ?>"></a>',
			prevText: '<i class="fa wxchev <?php echo $wxslider_chevron_left; ?>"></a>',
			slideWidth: 9000,
			minSlides: '<?php echo $wxslider_number; ?>',
			maxSlides: '<?php echo $wxslider_number; ?>'
		});		
	});
</script>

<!-- 
mode
Type of transition between slides
default: 'horizontal'
options: 'horizontal', 'vertical', 'fade'
speed
Slide transition duration (in ms)
default: 500
options: integer
slideMargin
Margin between each slide
default: 0
options: integer
startSlide
Starting slide index (zero-based)
default: 0
options: integer
randomStart
Start slider on a random slide
default: false
options: boolean (true / false)
slideSelector
Element to use as slides (ex. 'div.slide').
Note: by default, bxSlider will use all immediate children of the slider element
default: ''
options: jQuery selector
infiniteLoop
If true, clicking "Next" while on the last slide will transition to the first slide and vice-versa
default: true
options: boolean (true / false)
hideControlOnEnd
If true, "Next" control will be hidden on last slide and vice-versa
Note: Only used when infiniteLoop: false
default: false
options: boolean (true / false)
easing
The type of "easing" to use during transitions. If using CSS transitions, include a value for the transition-timing-function property. If not using CSS transitions, you may include plugins/jquery.easing.1.3.js for many options.
See http://gsgd.co.uk/sandbox/jquery/easing/ for more info.
default: null
options: if using CSS: 'linear', 'ease', 'ease-in', 'ease-out', 'ease-in-out', 'cubic-bezier(n,n,n,n)'. If not using CSS: 'swing', 'linear' (see the above file for more options)
captions
Include image captions. Captions are derived from the image's title attribute
default: false
options: boolean (true / false)
ticker
Use slider in ticker mode (similar to a news ticker)
default: false
options: boolean (true / false)
tickerHover
Ticker will pause when mouse hovers over slider. Note: this functionality does NOT work if using CSS transitions!
default: false
options: boolean (true / false)
adaptiveHeight
Dynamically adjust slider height based on each slide's height
default: false
options: boolean (true / false)
adaptiveHeightSpeed
Slide height transition duration (in ms). Note: only used if adaptiveHeight: true
default: 500
options: integer
video
If any slides contain video, set this to true. Also, include plugins/jquery.fitvids.js
See http://fitvidsjs.com/ for more info
default: false
options: boolean (true / false)
responsive
Enable or disable auto resize of the slider. Useful if you need to use fixed width sliders.
default: true
options: boolean (true / false)
useCSS
If true, CSS transitions will be used for horizontal and vertical slide animations (this uses native hardware acceleration). If false, jQuery animate() will be used.
default: true
options: boolean (true / false)
preloadImages
If 'all', preloads all images before starting the slider. If 'visible', preloads only images in the initially visible slides before starting the slider (tip: use 'visible' if all slides are identical dimensions)
default: visible
options: 'all', 'visible'
touchEnabled
If true, slider will allow touch swipe transitions
default: true
options: boolean (true / false)
swipeThreshold
Amount of pixels a touch swipe needs to exceed in order to execute a slide transition. Note: only used if touchEnabled: true
default: 50
options: integer
oneToOneTouch
If true, non-fade slides follow the finger as it swipes
default: true
options: boolean (true / false)
preventDefaultSwipeX
If true, touch screen will not move along the x-axis as the finger swipes
default: true
options: boolean (true / false)
preventDefaultSwipeY
If true, touch screen will not move along the y-axis as the finger swipes
default: false
options: boolean (true / false)
Pager

pager
If true, a pager will be added
default: true
options: boolean (true / false)
pagerType
If 'full', a pager link will be generated for each slide. If 'short', a x / y pager will be used (ex. 1 / 5)
default: 'full'
options: 'full', 'short'
pagerShortSeparator
If pagerType: 'short', pager will use this value as the separating character
default: ' / '
options: string
pagerSelector
Element used to populate the populate the pager. By default, the pager is appended to the bx-viewport
default: ''
options: jQuery selector
pagerCustom
Parent element to be used as the pager. Parent element must contain a <a data-slide-index="x"> element for each slide. See example here. Not for use with dynamic carousels.
default: null
options: jQuery selector
buildPager
If supplied, function is called on every slide element, and the returned value is used as the pager item markup.
See examples for detailed implementation
default: null
options: function(slideIndex)
Controls

controls
If true, "Next" / "Prev" controls will be added
default: true
options: boolean (true / false)
nextText
Text to be used for the "Next" control
default: 'Next'
options: string
prevText
Text to be used for the "Prev" control
default: 'Prev'
options: string
nextSelector
Element used to populate the "Next" control
default: null
options: jQuery selector
prevSelector
Element used to populate the "Prev" control
default: null
options: jQuery selector
autoControls
If true, "Start" / "Stop" controls will be added
default: false
options: boolean (true / false)
startText
Text to be used for the "Start" control
default: 'Start'
options: string
stopText
Text to be used for the "Stop" control
default: 'Stop'
options: string
autoControlsCombine
When slideshow is playing only "Stop" control is displayed and vice-versa
default: false
options: boolean (true / false)
autoControlsSelector
Element used to populate the auto controls
default: null
options: jQuery selector
Auto

auto
Slides will automatically transition
default: false
options: boolean (true / false)
pause
The amount of time (in ms) between each auto transition
default: 4000
options: integer
autoStart
Auto show starts playing on load. If false, slideshow will start when the "Start" control is clicked
default: true
options: boolean (true / false)
autoDirection
The direction of auto show slide transitions
default: 'next'
options: 'next', 'prev'
autoHover
Auto show will pause when mouse hovers over slider
default: false
options: boolean (true / false)
autoDelay
Time (in ms) auto show should wait before starting
default: 0
options: integer
Carousel

minSlides
The minimum number of slides to be shown. Slides will be sized down if carousel becomes smaller than the original size.
default: 1
options: integer
maxSlides
The maximum number of slides to be shown. Slides will be sized up if carousel becomes larger than the original size.
default: 1
options: integer
moveSlides
The number of slides to move on transition. This value must be >= minSlides, and <= maxSlides. If zero (default), the number of fully-visible slides will be used.
default: 0
options: integer
slideWidth
The width of each slide. This setting is required for all horizontal carousels!
default: 0
options: integer
Callbacks

onSliderLoad
Executes immediately after the slider is fully loaded
default: function(){}
options: function(currentIndex){ // your code here }
arguments:
  currentIndex: element index of the current slide
onSlideBefore
Executes immediately before each slide transition.
default: function(){}
options: function($slideElement, oldIndex, newIndex){ // your code here }
arguments:
  $slideElement: jQuery element of the destination element
  oldIndex: element index of the previous slide (before the transition)
  newIndex: element index of the destination slide (after the transition)
onSlideAfter
Executes immediately after each slide transition. Function argument is the current slide element (when transition completes).
default: function(){}
options: function($slideElement, oldIndex, newIndex){ // your code here }
arguments:
  $slideElement: jQuery element of the destination element
  oldIndex: element index of the previous slide (before the transition)
  newIndex: element index of the destination slide (after the transition)
onSlideNext
Executes immediately before each "Next" slide transition. Function argument is the target (next) slide element.
default: function(){}
options: function($slideElement, oldIndex, newIndex){ // your code here }
arguments:
  $slideElement: jQuery element of the destination element
  oldIndex: element index of the previous slide (before the transition)
  newIndex: element index of the destination slide (after the transition)
onSlidePrev
Executes immediately before each "Prev" slide transition. Function argument is the target (prev) slide element.
default: function(){}
options: function($slideElement, oldIndex, newIndex){ // your code here }
arguments:
  $slideElement: jQuery element of the destination element
  oldIndex: element index of the previous slide (before the transition)
  newIndex: element index of the destination slide (after the transition) -->