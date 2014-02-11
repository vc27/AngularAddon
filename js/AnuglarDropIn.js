/**
 * File Name AnuglarDropIn.js
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.00
 **/
var AnuglarDropIn = angular.module('AnuglarDropIn', []);

AnuglarDropIn.controller('AnuglarDropInCtrl', ['$scope', function($scope) {
	
	// Params
	$scope.text = 'yeah!';
	$scope.localize = AnuglarDropInObj;
	
}]); // end AnuglarDropIn.controller