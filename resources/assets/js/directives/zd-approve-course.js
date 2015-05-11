!function(app) {

   app.directive('zdApproveCourse', function() {
       return {
           link: function(scope, el) {
                $(el).on('click', function() {
                    console.log('hello');
                });
           }
       }
   });

}(app);