// 1
var App = Ember.Application.create();
// 2
App.Router.map(function() {
    this.resource("index", {
        "path" : "/"
    });
});
// 3
App.Message = DS.Model.extend({
    "user_id"       : DS.attr("integer"),
    "user_name"     : DS.attr("string"),
    "user_id_class" : DS.attr("string"),
    "message"       : DS.attr("string")
});
// 4
App.ApplicationAdapter = DS.FixtureAdapter.extend();
// 5
App.Message.FIXTURES = [
    // {
    //     "id"   : 1,
    //     "user" : "Chris",
    //     "text" : "Hello World."
    // },
    // {
    //     "id"   : 2,
    //     "user" : "Wayne",
    //     "text" : "Don't dig it, man."
    // },
    // {
    //     "id"   : 3,
    //     "user" : "Chris",
    //     "text" : "Meh."
    // }
];

try {
    if (!WebSocket) {
        console.log("no WebSocket support");
    } else {
        var socket = new WebSocket("ws://127.0.0.1:7778/");
        socket.addEventListener("open", function (e){
            console.log("open: ", e);
        });

        socket.addEventListener("error", function(e) {
            console.log("error: ", e);
        });

        socket.addEventListener("message", function(e) {
            console.log("message: ", JSON.parse(e.data));
        });

        cosole.log("socket", socket);

        window.socket = socket;
    }
} catch (e) {
    console.log("exception: " + e);
}