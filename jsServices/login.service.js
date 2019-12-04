contactsApp.service('loginService', function ($http) {
    let self = this;

    self.getUser = function () {
        return $http.get("http://mycontacts.test/login.php");
    };

    self.login = function (data) {
        return $http.post("http://mycontacts.test/login.php", data);
    };

    self.logOut = function () {
        return $http.delete("http://mycontacts.test/login.php");
    };

});