scheduler.service( 'BusinessUnitModel', function () {
    this.getBusinessUnits = function () {
        // todo: AJAX call to get business units
    };

    this.addBusinessUnit = function (businessUnitName, salons) {
        // todo: AJAX call to add business unit
    };

    this.addSalon = function( businessUnitId, salonId) {
        // todo: AJAX call to add salon to business unit (NOTE: Make sure to address the issue of salons within the business unit that should not be deleted when writing server side code)
    };

    this.deleteBusinessUnit = function(businessUnitId) {
        // todo: AJAX call to delete business unit
    };

    this.removeSalon = function($businessUnitId, $salonsId) {
        // todo: AJAX call to remove salon from business unit
    };
});