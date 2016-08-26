(function() {
    'use strict';

    var app = angular.module('app');

    app.service('AuthService', ['Backand', AuthServiceFunction]);

    function AuthServiceFunction(Backand) {
        var vm = this;
        
        vm.signup = function(firstname, lastname, email, password, confirmPassword) {
            if (password === confirmPassword) {
                var passcode = new jsSHA("SHA-1", "TEXT");
                passcode.update(password);
                var hash = passcode.getHash("HEX");
                return Backand.signup(firstname, lastname, email, password, confirmPassword, {"password": hash});
            } else {
                toastr.error("Password do not match");

                return;
            }
        };

    }
})();