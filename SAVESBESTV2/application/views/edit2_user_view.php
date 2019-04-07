 <body>
       <script src="../../devtools/js/jquery-1.11.3.min.js"></script>
    <nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header lighten-blue">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			    <span class="sr-only">Toggle navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index"><b>Plantastic Embryophytes</b></a>
			
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<div id="homenavbar" class="row pull-right">
				<div class="col-md-4">
				<?php
                        echo "<a href=''><b> User: ".$username."</b></a>";
             
				?>
			 
				</div>
				<div class="col-md-4">
				<div class="col-md-4">
				</div>
      				<a class="btn btn-primary" href="logout" role="button">Logout</a>
        			</div>
			
      </div>
      
		</div>
	</div>
    </nav>

<div>
<h1>Subscriber management</h1>
<?php echo $this->table->generate(); ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var oTable = $('#big_table').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '<?php site_url('EditUserProfile2/datatable') ?>',
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayStart ": 20,
            "oLanguage": {
                //"sProcessing": "<img src='<?php echo base_url(); ?>assets/images/ajax-loader_dark.gif'>"
            },
            "fnInitComplete": function () {
                //oTable.fnAdjustColumnSizing();
            },
            'fnServerData': function (sSource, aoData, fnCallback) {
                $.ajax
                ({
                    'dataType': 'json',
                    'type': 'POST',
                    'url': sSource,
                    'data': aoData,
                    'success': fnCallback
                });
            }
        });
    });
</script>
