(function() {
    'use strict';

    var app = angular.module('app');

    app.service('AuthService', ['Backand', AuthServiceFunction]);

    function AuthServiceFunction(Backand) {
        var vm = this;
        
        vm.signup = function(firstname, lastname, email, password, confirmPassword) {
            return Backand.signup(firstname, lastname, email, password, confirmPassword);
        }

        vm.login = function(email, password) {
            return Backand.signin(email, password);
        }
    }
})();