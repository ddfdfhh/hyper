<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Home - Hyper Meteor </title>
      @include('front.inc.css')
   </head>
   <body>
       @include('front.inc.header')
      
       @yield('content')
       
       
      @include('front.inc.footer')
      @include('front.inc.script')
   </body>
</html>