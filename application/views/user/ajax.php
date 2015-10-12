        <script type="text/javascript">
            
            var controller = 'user';
            var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function ?>';

            function load_data_ajax_connect(type){
                $.ajax({
                    'url' : base_url + '/' + controller + '/connect/',
                    'type' : 'POST', //the way you want to send data to your URL
                    'data' : {'type' : type},
                    'success' : function(data){ //probably this request will return anything, it'll be put in var "data"
                        var container = $('#jqueryResult'); //jquery selector (get element by id)
                        if(data){
                            container.html(data);
                        }
                    }
                });
            }
        </script>        
		
		<script type="text/javascript">
            
            var controller = 'user';
            var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function ?>';
			
            function load_data_ajax_unfriend(type){
                $.ajax({
                    'url' : base_url + '/' + controller + '/unfriend/',
                    'type' : 'POST', //the way you want to send data to your URL
                    'data' : {'type' : type},
                    'success' : function(data){ //probably this request will return anything, it'll be put in var "data"
                        var container = $('#jqueryResult'); //jquery selector (get element by id)
                        if(data){
                            container.html(data);
                        }
                    }
                });
            }
        </script>

		<script type="text/javascript">
            
            var controller = 'user';
            var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function ?>';
			
            function load_data_ajax_accept(type){
                $.ajax({
                    'url' : base_url + '/' + controller + '/accept/',
                    'type' : 'POST', //the way you want to send data to your URL
                    'data' : {'type' : type},
                    'success' : function(data){ //probably this request will return anything, it'll be put in var "data"
                        var container = $('#jqueryResult'); //jquery selector (get element by id)
                        if(data){
                            container.html(data);
                        }
                    }
                });
            }
        </script>