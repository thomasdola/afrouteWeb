$(function(){
	function error(text)
	{
		$.notify({
		message: text,
	}, {
		type: 'danger'
	});
	};

	function success(text)
	{
		$.notify({
		message: text,
	}, {
		type: 'success',
		animate: {
				enter: 'animated bounceInDown',
				exit: 'animated bounceOutUp'
			}
	});
	}


	$('form[data-remote]').on('submit', function(e){
		e.preventDefault();
		
		var form = $(this);
		var formId = form.prop('id'); 
		var method = form.find('input[name="_method"]').val() || 'POST';
		var url = form.prop('action');
		var data = form.serialize();
		var endpoint = $('table#'+formId);


		function data_load(endpoint, data)
		{

			endpoint.html(data);
		}

		$.ajax({
			type: method,
			url: url,
			data: data,
			success: function(data)
			{
				var text = 'Operation Successful';
				success(text);
				// console.log($('table#'+formId));
				data_load(endpoint, data);
				form.find('[type=text]').val('');
			},
			error: function(errorThronw)
			{
				var text = 'Oops! Operation Failed';
				// console.log(errorThronw.responseText);
				error(text);
			}
		});
		
	});


	$('form[data-delete]').on('submit', function(e)
		{
			e.preventDefault();

			var form = $(this);
			var url = form.prop('action');
			var type = form.find('input[name="_method"]').val() || 'DEELTE';
			var data = form.serialize();
			var row = form.parent().parent();

			
			$.ajax(
				{
					type: 'delete',
					url: url,
					data: data,
					success: function()
					{
						var text = "Successfully Deleted...";
						success(text);
						// console.log(row);
						row.empty();

					},
					error: function()
					{
						var text = "Oops Operation failed";
						error(text);
					}
				});
		});

	// $('div[contenteditable]').on('blur', function(e)
	// 	{
	// 		var element = $(this);
	// 		var text = element.text();
	// 		var id = element.attr('id');
	// 		var token = element.attr('data-token');
	// 		// console.log(token);
	// 		$.ajax({
	// 			type: 'patch',
	// 			url: 'admin/faqs/'+ id,
	// 			data: {text: text, id: id, _token: token },
	// 			success: function(data)
	// 			{
	// 				var text = 'Updated Successfully.';
	// 				success(text);
	// 				console.log(data);
	// 			},
	// 			error: function()
	// 			{
	// 				var text = 'Oops! There was error.';
	// 				error(text);
	// 			}
	// 		});
	// 	});

		// $('form[data-insearch]').on('submit', function(e)
		// {
		// 	e.preventDefault();
		// 	var form = $(this);
		// 	var data = form.serialize();
		// 	var url = form.prop('action');
		// 	var token = form.find('input[name="_method"]').val();
			
		// 	console.log(data);
		// 	//window.location = "/trips";
		// 	$.ajax({
		// 		type: 'get',
		// 		url: url,
		// 		data: data,
		// 		success: function(data)
		// 		{
		// 			window.location = "/trips";
		// 			console.log(data);
		// 		},
		// 		error: function()
		// 		{

		// 		}
		// 	});
		// });



	var checkboxFilter = {

	  // Declare any variables we will need as properties of the object

	  $filters: null,
	  //$reset: null,
	  groups: [],
	  outputArray: [],
	  outputString: '',

	  // The "init" method will run on document ready and cache any jQuery objects we will need.

	  init: function(){
	    var self = this; // As a best practice, in each method we will asign "this" to the variable "self"
	    // so that it remains scope-agnostic. We will use it to refer to the parent "checkboxFilter"
	    // object so that we can share methods and properties between all parts of the object.

	    self.$filters = $('#Filters');
	    //self.$reset = $('#Reset');
	    self.$container = $('#filterList');

	    self.$filters.find('li').each(function(){
	      self.groups.push({
	        $inputs: $(this).find('input'),
	        active: [],
			    tracker: false
	      });
	    });

	    self.bindHandlers();
	  },

	  // The "bindHandlers" method will listen for whenever a form value changes.

	  bindHandlers: function(){
	    var self = this;

	    self.$filters.on('ifChanged', function(){
	      self.parseFilters();
	    });

	    //self.$reset.on('click', function(e){
	    //  e.preventDefault();
	    //  self.$filters[0].reset();
	    //  self.parseFilters();
	    //});
	  },

	  // The parseFilters method checks which filters are active in each group:

	  parseFilters: function(){
	    var self = this;

	    // loop through each filter group and add active filters to arrays

	    for(var i = 0, group; group = self.groups[i]; i++){
	      group.active = []; // reset arrays
	      group.$inputs.each(function(){
	        $(this).is(':checked') && group.active.push(this.value);
	      });
		    group.active.length && (group.tracker = 0);
	    }

	    self.concatenate();
	  },

	  // The "concatenate" method will crawl through each group, concatenating filters as desired:

	  concatenate: function(){
	    var self = this,
			  cache = '',
			  crawled = false,
			  checkTrackers = function(){
	        var done = 0;

	        for(var i = 0, group; group = self.groups[i]; i++){
	          (group.tracker === false) && done++;
	        }

	        return (done < self.groups.length);
	      },
	      crawl = function(){
	        for(var i = 0, group; group = self.groups[i]; i++){
	          group.active[group.tracker] && (cache += group.active[group.tracker]);

	          if(i === self.groups.length - 1){
	            self.outputArray.push(cache);
	            cache = '';
	            updateTrackers();
	          }
	        }
	      },
	      updateTrackers = function(){
	        for(var i = self.groups.length - 1; i > -1; i--){
	          var group = self.groups[i];

	          if(group.active[group.tracker + 1]){
	            group.tracker++;
	            break;
	          } else if(i > 0){
	            group.tracker && (group.tracker = 0);
	          } else {
	            crawled = true;
	          }
	        }
	      };

	    self.outputArray = []; // reset output array

		  do{
			  crawl();
		  }
		  while(!crawled && checkTrackers());

	    self.outputString = self.outputArray.join();

	    // If the output string is empty, show all rather than none:

	    !self.outputString.length && (self.outputString = 'all');

	    //console.log(self.outputString);

	    // ^ we can check the console here to take a look at the filter string that is produced

	    // Send the output string to MixItUp via the 'filter' method:

		  if(self.$container.mixItUp('isLoaded')){
	    	self.$container.mixItUp('filter', self.outputString);
		  }
	  }
	};




	checkboxFilter.init();

  // Instantiate MixItUp

  $('#filterList').mixItUp({
    controls: {
      enable: false // we won't be needing these
    },
    animation: {
      effects: 'fade'
    },
	  layout:{
		  display: 'inherit'
	  },
	  callbacks: {
		  onMixFail: function(){
			  $.dialog({
			      title: 'Oops!',
			      content: 'Nothing Found',
			  });
		  }
	  }
  });

  $('#bT, #paidT').dataTable();

	$('#artBody').wysihtml5({
        toolbar: {
            link: false,
            image: false,
			lists: false,
	        blockquote: false
        }
    });


	// Instance the tour
	//var tour = new Tour({
	//  steps: [
	//  {
	//    element: "#from",
	//    title: "Step one",
	//    content: "Select your Departure City"
	//  },
	//  {
	//    element: "#to",
	//    title: "step two",
	//    content: "Select your Destination City"
	//  },
	//	  {
	//        element: "#date",
	//        title: "step three",
	//        content: "Choose your Departure Date"
	//      },
	//	  {
	//        element: "#search",
	//        title: "step four",
	//        content: "Click on Search Button"
	//      },
	//]});

	// Initialize the tour
	//tour.init();

	// Start the tour
	//tour.start();

	$(function(){

		//$.noty.defaults = {
		//    layout: 'top',
		//    theme: 'defaultTheme', // or 'relax'
		//    type: 'alert',
		//    text: '<a href="#">Lke us</a>', // can be html or string
		//    dismissQueue: true, // If you want to use queue feature set this true
		//    template: '<div class="noty_message"><span class="noty_text"></span><div class="noty_close"></div></div>',
		//    animation: {
		//        open: {height: 'toggle'}, // or Animate.css class names like: 'animated bounceInLeft'
		//        close: {height: 'toggle'}, // or Animate.css class names like: 'animated bounceOutLeft'
		//        easing: 'swing',
		//        speed: 500 // opening & closing animation speed
		//    },
		//    timeout: false, // delay for closing event. Set false for sticky notifications
		//    force: false, // adds notification to the beginning of queue when set to true
		//    modal: false,
		//    maxVisible: 5, // you can set max visible notification for dismissQueue true option,
		//    killer: false, // for close all notifications before show
		//    closeWith: ['click'], // ['click', 'button', 'hover', 'backdrop'] // backdrop click will close all notifications
		//    callback: {
		//        onShow: function() {},
		//        afterShow: function() {},
		//        onClose: function() {
		//	        win.foucs();
		//        },
		//        afterClose: function() {},
		//        onCloseClick: function() {},
		//    },
		//    buttons: false // an array of buttons
		//};


		//noty({
		//    text: 'NOTY - a jquery notification library!',
		//    animation: {
		//        open: {height: 'toggle'}, // jQuery animate function property object
		//        close: {height: 'toggle'}, // jQuery animate function property object
		//        easing: 'swing', // easing
		//        speed: 500 // opening & closing animation speed
		//    },
		//	callbacks: {
		//		onClose: function(){
		//			var win = window.open('http://facebook/afroute', '_blank');
		//			win.focus();
		//		}
		//	}
		//});

	})

	setTimeout('$(".alert-welcome, .success-info").addClass("animated fadeOutUp")',10000);
	setTimeout('$(".search-error").addClass("animated slideOutRight")',10000);
	//setInterval(function(){
	//	$('.alert-twitter, .alert-facebook').addClass('animated rubberBand')
	//}, 3000);


});