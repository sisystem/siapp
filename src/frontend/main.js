$(document).ready(function() {
    var AppView = Backbone.View.extend({

        el: '#container',

        initialize: function() {
            this.render();
        },

        render: function() {
            this.$el.html("Iam AppView - backbone view");
        }
    });

    var appView = new AppView();
});
