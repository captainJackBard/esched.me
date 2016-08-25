var app = angular.module('app', ['backand', 'ngRoute', 'cgBusy']);

app.config(function(BackandProvider) {
    BackandProvider.setAppName('dodongx');
    BackandProvider.setSignUpToken('a7a341b4-d4b3-46b1-a786-c7c4c1776719');
    BackandProvider.setAnonymousToken('047a5ffa-e1ee-457e-8141-a6f3ab54d8ca');
});

app.run(function($rootScope, Backand) {
    Backand.setRunSignupAfterErrorInSigninSocial(false);
    $rootScope.$on(Backand.EVENTS.SIGNIN, function(event, data) {
        
    });
});