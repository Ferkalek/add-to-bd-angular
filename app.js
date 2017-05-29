angular.module("exampleApp", [])
.controller("defaultCtrl", function ($scope, $http) {

    // текущее педставление
    $scope.currentView = "table";

    // получение всех записей
    getItem();

    function getItem() {
        $http.post('select_bd.php').success(function (data) {
            $scope.items = data;
        });
    }

    // создание (добавление) новй записи
    $scope.create = function (item) {
        $http.post('add_bd.php?name='+item.name+'&quantity='+item.quantity).success(function () {
            getItem();
            $scope.currentView = "table";
        });
    };

    // удаление записи
    $scope.delete = function (item) {
        if (confirm("Вы уверены что хотите удалить данную запись?")) {
            $http.post('del_bd.php?itemID='+item.id).success(function () {
                $scope.items.splice($scope.items.indexOf(item), 1);
            });
        }
    };

    // обновление записи
    $scope.update = function (item) {
        $http.post('update_bd.php?id='+item.id+'&name='+item.name+'&quantity='+item.quantity).success(function () {
            getItem();
            $scope.currentView = "table";
        });
    };

    // редеактирование существующего или создание нового элемента
    $scope.editOrCreate = function (item) {
        $scope.currentItem = item ? angular.copy(item) : {};
        $scope.currentView = "edit";
    };

    // сохранение изменений
    $scope.saveEdit = function (item) {
        if (angular.isDefined(item.id)) {
            $scope.update(item);
        } else {
            $scope.create(item);
        }
    };

    // отмена изменений и возврат в представление table
    $scope.cancelEdit = function () {
        $scope.currentItem = {};
        $scope.currentView = "table";
    };
});