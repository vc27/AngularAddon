/**
 * File Name AngularAddon.js
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.00
 **/
var AngularAddon = angular.module('AngularAddon', []);

AngularAddon.controller('AngularAddonCtrl', ['$scope', function($scope) {
	
	// Params
	$scope.text = 'yeah!';
	$scope.localize = AngularAddonObj;
	
}]); // end AngularAddon.controller