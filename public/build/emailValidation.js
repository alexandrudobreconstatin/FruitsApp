"use strict";
(self["webpackChunkFruitsApp"] = self["webpackChunkFruitsApp"] || []).push([["emailValidation"],{

/***/ "./assets/js/emailValidation.js":
/*!**************************************!*\
  !*** ./assets/js/emailValidation.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var email_validator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! email-validator */ "./node_modules/email-validator/index.js");


/***/ }),

/***/ "./node_modules/email-validator/index.js":
/*!***********************************************!*\
  !*** ./node_modules/email-validator/index.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, exports) => {



var tester = /^[-!#$%&'*+\/0-9=?A-Z^_a-z{|}~](\.?[-!#$%&'*+\/0-9=?A-Z^_a-z`{|}~])*@[a-zA-Z0-9](-*\.?[a-zA-Z0-9])*\.[a-zA-Z](-?[a-zA-Z0-9])+$/;
// Thanks to:
// http://fightingforalostcause.net/misc/2006/compare-email-regex.php
// http://thedailywtf.com/Articles/Validating_Email_Addresses.aspx
// http://stackoverflow.com/questions/201323/what-is-the-best-regular-expression-for-validating-email-addresses/201378#201378
exports.validate = function(email)
{
	if (!email)
		return false;
		
	if(email.length>254)
		return false;

	var valid = tester.test(email);
	if(!valid)
		return false;

	// Further checking of some things regex can't handle
	var parts = email.split("@");
	if(parts[0].length>64)
		return false;

	var domainParts = parts[1].split(".");
	if(domainParts.some(function(part) { return part.length>63; }))
		return false;

	return true;
}

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ var __webpack_exports__ = (__webpack_exec__("./assets/js/emailValidation.js"));
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiZW1haWxWYWxpZGF0aW9uLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQ0FhO0FBQ2I7QUFDQSx5Q0FBeUMsRUFBRSxpQ0FBaUMsRUFBRTtBQUM5RTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGdCQUFnQjtBQUNoQjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esc0NBQXNDLHdCQUF3QjtBQUM5RDtBQUNBO0FBQ0E7QUFDQSIsInNvdXJjZXMiOlsid2VicGFjazovL0ZydWl0c0FwcC8uL2Fzc2V0cy9qcy9lbWFpbFZhbGlkYXRpb24uanMiLCJ3ZWJwYWNrOi8vRnJ1aXRzQXBwLy4vbm9kZV9tb2R1bGVzL2VtYWlsLXZhbGlkYXRvci9pbmRleC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgdmFsaWRhdG9yIGZyb20gJ2VtYWlsLXZhbGlkYXRvcic7XHJcbiIsIlwidXNlIHN0cmljdFwiO1xyXG5cclxudmFyIHRlc3RlciA9IC9eWy0hIyQlJicqK1xcLzAtOT0/QS1aXl9hLXp7fH1+XShcXC4/Wy0hIyQlJicqK1xcLzAtOT0/QS1aXl9hLXpge3x9fl0pKkBbYS16QS1aMC05XSgtKlxcLj9bYS16QS1aMC05XSkqXFwuW2EtekEtWl0oLT9bYS16QS1aMC05XSkrJC87XHJcbi8vIFRoYW5rcyB0bzpcclxuLy8gaHR0cDovL2ZpZ2h0aW5nZm9yYWxvc3RjYXVzZS5uZXQvbWlzYy8yMDA2L2NvbXBhcmUtZW1haWwtcmVnZXgucGhwXHJcbi8vIGh0dHA6Ly90aGVkYWlseXd0Zi5jb20vQXJ0aWNsZXMvVmFsaWRhdGluZ19FbWFpbF9BZGRyZXNzZXMuYXNweFxyXG4vLyBodHRwOi8vc3RhY2tvdmVyZmxvdy5jb20vcXVlc3Rpb25zLzIwMTMyMy93aGF0LWlzLXRoZS1iZXN0LXJlZ3VsYXItZXhwcmVzc2lvbi1mb3ItdmFsaWRhdGluZy1lbWFpbC1hZGRyZXNzZXMvMjAxMzc4IzIwMTM3OFxyXG5leHBvcnRzLnZhbGlkYXRlID0gZnVuY3Rpb24oZW1haWwpXHJcbntcclxuXHRpZiAoIWVtYWlsKVxyXG5cdFx0cmV0dXJuIGZhbHNlO1xyXG5cdFx0XHJcblx0aWYoZW1haWwubGVuZ3RoPjI1NClcclxuXHRcdHJldHVybiBmYWxzZTtcclxuXHJcblx0dmFyIHZhbGlkID0gdGVzdGVyLnRlc3QoZW1haWwpO1xyXG5cdGlmKCF2YWxpZClcclxuXHRcdHJldHVybiBmYWxzZTtcclxuXHJcblx0Ly8gRnVydGhlciBjaGVja2luZyBvZiBzb21lIHRoaW5ncyByZWdleCBjYW4ndCBoYW5kbGVcclxuXHR2YXIgcGFydHMgPSBlbWFpbC5zcGxpdChcIkBcIik7XHJcblx0aWYocGFydHNbMF0ubGVuZ3RoPjY0KVxyXG5cdFx0cmV0dXJuIGZhbHNlO1xyXG5cclxuXHR2YXIgZG9tYWluUGFydHMgPSBwYXJ0c1sxXS5zcGxpdChcIi5cIik7XHJcblx0aWYoZG9tYWluUGFydHMuc29tZShmdW5jdGlvbihwYXJ0KSB7IHJldHVybiBwYXJ0Lmxlbmd0aD42MzsgfSkpXHJcblx0XHRyZXR1cm4gZmFsc2U7XHJcblxyXG5cdHJldHVybiB0cnVlO1xyXG59Il0sIm5hbWVzIjpbInZhbGlkYXRvciJdLCJzb3VyY2VSb290IjoiIn0=