/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/***/ (() => {

eval("var arrow = document.querySelectorAll(\".arrow\");\n\nfor (var i = 0; i < arrow.length; i++) {\n  arrow[i].addEventListener(\"click\", function (e) {\n    var arrowParent = e.target.parentElement.parentElement;\n    arrowParent.classList.toggle(\"showMenu\");\n  });\n}\n\nvar sidebar = document.querySelector(\".sidebar\");\nvar sidebarBtn = document.querySelector(\".fa-bars\");\nconsole.log(sidebarBtn);\nsidebarBtn.addEventListener(\"click\", function () {\n  sidebar.classList.toggle(\"close\");\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbWFpbi5qcz9mMzJhIl0sIm5hbWVzIjpbImFycm93IiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yQWxsIiwiaSIsImxlbmd0aCIsImFkZEV2ZW50TGlzdGVuZXIiLCJlIiwiYXJyb3dQYXJlbnQiLCJ0YXJnZXQiLCJwYXJlbnRFbGVtZW50IiwiY2xhc3NMaXN0IiwidG9nZ2xlIiwic2lkZWJhciIsInF1ZXJ5U2VsZWN0b3IiLCJzaWRlYmFyQnRuIiwiY29uc29sZSIsImxvZyJdLCJtYXBwaW5ncyI6IkFBQUEsSUFBSUEsS0FBSyxHQUFHQyxRQUFRLENBQUNDLGdCQUFULENBQTBCLFFBQTFCLENBQVo7O0FBQ0EsS0FBSyxJQUFJQyxDQUFDLEdBQUcsQ0FBYixFQUFnQkEsQ0FBQyxHQUFHSCxLQUFLLENBQUNJLE1BQTFCLEVBQWtDRCxDQUFDLEVBQW5DLEVBQXVDO0FBQ25DSCxFQUFBQSxLQUFLLENBQUNHLENBQUQsQ0FBTCxDQUFTRSxnQkFBVCxDQUEwQixPQUExQixFQUFtQyxVQUFDQyxDQUFELEVBQU87QUFDdEMsUUFBSUMsV0FBVyxHQUFHRCxDQUFDLENBQUNFLE1BQUYsQ0FBU0MsYUFBVCxDQUF1QkEsYUFBekM7QUFDQUYsSUFBQUEsV0FBVyxDQUFDRyxTQUFaLENBQXNCQyxNQUF0QixDQUE2QixVQUE3QjtBQUNILEdBSEQ7QUFJSDs7QUFFRCxJQUFJQyxPQUFPLEdBQUdYLFFBQVEsQ0FBQ1ksYUFBVCxDQUF1QixVQUF2QixDQUFkO0FBQ0EsSUFBSUMsVUFBVSxHQUFHYixRQUFRLENBQUNZLGFBQVQsQ0FBdUIsVUFBdkIsQ0FBakI7QUFDQUUsT0FBTyxDQUFDQyxHQUFSLENBQVlGLFVBQVo7QUFDQUEsVUFBVSxDQUFDVCxnQkFBWCxDQUE0QixPQUE1QixFQUFxQyxZQUFNO0FBQ3ZDTyxFQUFBQSxPQUFPLENBQUNGLFNBQVIsQ0FBa0JDLE1BQWxCLENBQXlCLE9BQXpCO0FBQ0gsQ0FGRCIsInNvdXJjZXNDb250ZW50IjpbImxldCBhcnJvdyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIuYXJyb3dcIik7XG5mb3IgKHZhciBpID0gMDsgaSA8IGFycm93Lmxlbmd0aDsgaSsrKSB7XG4gICAgYXJyb3dbaV0uYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XG4gICAgICAgIGxldCBhcnJvd1BhcmVudCA9IGUudGFyZ2V0LnBhcmVudEVsZW1lbnQucGFyZW50RWxlbWVudDtcbiAgICAgICAgYXJyb3dQYXJlbnQuY2xhc3NMaXN0LnRvZ2dsZShcInNob3dNZW51XCIpO1xuICAgIH0pO1xufVxuXG5sZXQgc2lkZWJhciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuc2lkZWJhclwiKTtcbmxldCBzaWRlYmFyQnRuID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5mYS1iYXJzXCIpO1xuY29uc29sZS5sb2coc2lkZWJhckJ0bik7XG5zaWRlYmFyQnRuLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoKSA9PiB7XG4gICAgc2lkZWJhci5jbGFzc0xpc3QudG9nZ2xlKFwiY2xvc2VcIik7XG59KTtcbiJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvbWFpbi5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/main.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/main.js"]();
/******/ 	
/******/ })()
;