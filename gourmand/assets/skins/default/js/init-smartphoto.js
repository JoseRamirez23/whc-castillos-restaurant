document.addEventListener('DOMContentLoaded', function () {
	new smartPhoto(".js-smartPhoto");
	new smartPhoto(".js-smartPhoto-hide", {
		arrows: false,
		nav: false
	});
	new smartPhoto(".js-smartPhoto-fit", {
		resizeStyle: 'fit'
	});
});
