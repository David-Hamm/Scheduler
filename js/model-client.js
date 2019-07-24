scheduler.service('ClientModel', function() {
    this.addClient = function(name, address, phone) {
        // todo: add AJAX to add a new client
    };
    this.removeClient = function(clientId) {
        // todo add AJAX call to remove client from client list
    };
    this.modifyClientName = function(clientId, name) {
        // todo add AJAX call to change client's name
    };
    this.modifyClientAddress = function(clientId, address) {
        // todo add AJAX call to cahnge client address
    }
    this.modifyClientPhone = function(clientId, phone) {
        // todo Add AJX call to modify phone
    }
});