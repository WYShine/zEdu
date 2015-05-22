!function(app) {

    app.directive('queryFilter', ['$location', function($location) {
        return {
            restrict: 'C',
            link: function(scope, el) {
                el.find('input[type="radio"]').bind('change', function(e) {
                    var $this = $(this);
                    if ($this.is(':checked')) {
                        var key = $this.attr('name');
                        var value = $this.attr('value');
                        var qs = $.deparam(window.location.search.replace(/^\?/,''));
                        qs[key]=value;
                        window.location.search = '?' + $.param(qs);
                    }
                });
            }
        }
    }]);
}(angular.module('zedu'));