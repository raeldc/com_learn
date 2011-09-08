window.addEvent('domready', function(){
	if(Element.scrollable) $$('.-scrollable').scrollable();
});

// Set the height of flexboxes based on its parent container's height
var Scrollable = new Class({
	Implements: [Options, Events],

	options: {
		height: '500px'
	},

	initialize: function(element, options){
		this.element = element;
		window.addEvent('resize', this.resize.bind(this));
		window.fireEvent('resize');
	},

	resize: function(){
		this.element.setStyle('height', this.element.getParent().getStyle('height'));
	}
});

Element.implement({
	scrollable: function(options){
		new Scrollable(this, options);
		return this;
	}
});