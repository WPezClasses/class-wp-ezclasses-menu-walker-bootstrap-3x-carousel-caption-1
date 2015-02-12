# Org: WPezClasses
### Product: Class_WP_ezClasses_Menu_Walker_Bootstrap_3x_Carousel_Caption_1

##### The ezWay to use Bootstrap's 3.x javascript carousel as a simple text "slider". 

Note: You can also use CSS3 (transitions) and take advantage of the classes the carousel assigns as it cycles.

For example, instead of sliding out you can fade out instead. 

=======================================================================================

#### WPezClasses: Getting Started
- https://github.com/WPezClasses/wp-ezclasses-docs-getting-started

=======================================================================================


#### Overview

- REF: http://getbootstrap.com/javascript/#carousel

- Note: You're going to have to manually wire up the carousel. See above link.

- When using the WordPress menu manager, WP will not let you add a (new) Links without a URL. However, once you add the Link to a menu, WP will allow you remove the URL. That is, there is no validation for a required URL once Link is in the Menu Structure pane. The class checks to see whether Link Test should be wrapped in a <a href="..."> or not. That is, you can have Links in the carousel that don't actually link.


#### Example: CSS3 Transform

Note: This is simply a quick example / sample. 

```
/* this is NOT part of the menu */
.carousel-wrapper{
  height: 50px;
  background-color: #000
}

.carousel-caption{
  font-size:18px;
  line-height:1.0;
  padding-top:0;
  position:initial
}

/* overide of the carousel's default. more or less stops the sliding but leaves the cycling and how that changes the classes */
.carousel-inner > .item.active.left {
  left: 0;
  -webkit-transform: translate3d(0%, 0, 0);
  transform: translate3d(0%, 0, 0);
}
  
.carousel-inner > .item > .carousel-caption {
  height:0;
  overflow:hidden;
  opacity:0.0;
  padding-top:0px;  
  transition: opacity 0.35s ease-in-out, padding 0.8s linear;
   -moz-transition: opacity 0.35s ease-in-out, padding 0.8s linear;
   -webkit-transition: opacity 0.35s ease-in-out, padding 0.8s linear;
   -ms-transition: opacity 0.35s ease-in-out, padding 0.8s linear;
}

/* slide as it's active - note: first slide starts as active */
.carousel-inner > .item.active > .carousel-caption{
  color: #fff;
  text-shadow:none;
  opacity:1.0;
  padding-top:15px;
  transition: opacity 2.0s ease-in-out, padding 1.0s linear;
   -moz-transition: opacity 2.0s ease-in-out, padding 1.0s linear;
   -webkit-transition: opacity 2.0s ease-in-out, padding 1.0s linear;
   -ms-transition: opacity 2.0s ease-in-out, padding 1.0s linear;
}

/* slide going out */
.carousel-inner > .item.active.left > .carousel-caption{
  opacity:0.0;
   transition: opacity 0.55s ease-in-out;
   -moz-transition: opacity 0.55s ease-in-out;
   -webkit-transition: opacity 0.55s ease-in-out;
   -ms-transition: opacity 0.55s ease-in-out;
}

/* next slide coming in */
.carousel-inner > .item.next.left > .carousel-caption{
  opacity:0.0;
  padding-top:50px;
  text-shadow:none
}
```