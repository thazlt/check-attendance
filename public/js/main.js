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

eval("var arrow = document.querySelectorAll(\".arrow\");\n\nfor (var i = 0; i < arrow.length; i++) {\n  arrow[i].addEventListener(\"click\", function (e) {\n    var arrowParent = e.target.parentElement.parentElement;\n    arrowParent.classList.toggle(\"showMenu\");\n  });\n}\n\nvar sidebar = document.querySelector(\".sidebar\");\nvar sidebarBtn = document.querySelector(\".fa-bars\");\nconsole.log(sidebarBtn);\nsidebarBtn.addEventListener(\"click\", function () {\n  sidebar.classList.toggle(\"close\");\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbWFpbi5qcz9mMzJhIl0sIm5hbWVzIjpbImFycm93IiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yQWxsIiwiaSIsImxlbmd0aCIsImFkZEV2ZW50TGlzdGVuZXIiLCJlIiwiYXJyb3dQYXJlbnQiLCJ0YXJnZXQiLCJwYXJlbnRFbGVtZW50IiwiY2xhc3NMaXN0IiwidG9nZ2xlIiwic2lkZWJhciIsInF1ZXJ5U2VsZWN0b3IiLCJzaWRlYmFyQnRuIiwiY29uc29sZSIsImxvZyJdLCJtYXBwaW5ncyI6IkFBQUEsSUFBSUEsS0FBSyxHQUFHQyxRQUFRLENBQUNDLGdCQUFULENBQTBCLFFBQTFCLENBQVo7O0FBQ0EsS0FBSyxJQUFJQyxDQUFDLEdBQUcsQ0FBYixFQUFnQkEsQ0FBQyxHQUFHSCxLQUFLLENBQUNJLE1BQTFCLEVBQWtDRCxDQUFDLEVBQW5DLEVBQXVDO0FBQ25DSCxFQUFBQSxLQUFLLENBQUNHLENBQUQsQ0FBTCxDQUFTRSxnQkFBVCxDQUEwQixPQUExQixFQUFtQyxVQUFDQyxDQUFELEVBQU87QUFDdEMsUUFBSUMsV0FBVyxHQUFHRCxDQUFDLENBQUNFLE1BQUYsQ0FBU0MsYUFBVCxDQUF1QkEsYUFBekM7QUFDQUYsSUFBQUEsV0FBVyxDQUFDRyxTQUFaLENBQXNCQyxNQUF0QixDQUE2QixVQUE3QjtBQUNILEdBSEQ7QUFJSDs7QUFFRCxJQUFJQyxPQUFPLEdBQUdYLFFBQVEsQ0FBQ1ksYUFBVCxDQUF1QixVQUF2QixDQUFkO0FBQ0EsSUFBSUMsVUFBVSxHQUFHYixRQUFRLENBQUNZLGFBQVQsQ0FBdUIsVUFBdkIsQ0FBakI7QUFDQUUsT0FBTyxDQUFDQyxHQUFSLENBQVlGLFVBQVo7QUFDQUEsVUFBVSxDQUFDVCxnQkFBWCxDQUE0QixPQUE1QixFQUFxQyxZQUFNO0FBQ3ZDTyxFQUFBQSxPQUFPLENBQUNGLFNBQVIsQ0FBa0JDLE1BQWxCLENBQXlCLE9BQXpCO0FBQ0gsQ0FGRCIsInNvdXJjZXNDb250ZW50IjpbImxldCBhcnJvdyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIuYXJyb3dcIik7XHJcbmZvciAodmFyIGkgPSAwOyBpIDwgYXJyb3cubGVuZ3RoOyBpKyspIHtcclxuICAgIGFycm93W2ldLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xyXG4gICAgICAgIGxldCBhcnJvd1BhcmVudCA9IGUudGFyZ2V0LnBhcmVudEVsZW1lbnQucGFyZW50RWxlbWVudDtcclxuICAgICAgICBhcnJvd1BhcmVudC5jbGFzc0xpc3QudG9nZ2xlKFwic2hvd01lbnVcIik7XHJcbiAgICB9KTtcclxufVxyXG5cclxubGV0IHNpZGViYXIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLnNpZGViYXJcIik7XHJcbmxldCBzaWRlYmFyQnRuID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5mYS1iYXJzXCIpO1xyXG5jb25zb2xlLmxvZyhzaWRlYmFyQnRuKTtcclxuc2lkZWJhckJ0bi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKCkgPT4ge1xyXG4gICAgc2lkZWJhci5jbGFzc0xpc3QudG9nZ2xlKFwiY2xvc2VcIik7XHJcbn0pO1xyXG4iXSwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL21haW4uanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/main.js\n");

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