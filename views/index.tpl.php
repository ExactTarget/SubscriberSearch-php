<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/header.php';
?>
		<div class="container">    
			<div class="row">
				<div class="span12">
					<ul class="breadcrumb">
					  <li class="active"><b>Home</b></li>			  
					</ul>			
					<?php if( $this->token ): ?>
					<?php elseif( !$this->token ): ?>
						<div class="alert alert-error"><b>Error</b> Unable to obtain an access token</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
					
		<div class="container">    
			<div class="row">
				<div class="span12">
					<h1>Overview
						<div class="btn-group pull-right">
							<button class="btn btn-primary" id="btnCreate">Create a new message</button>
							<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="/messages" id="existingMessage">From existing message</a></li>
								<li><a href="/createtemplate" id="newTemplate">From new template</a></li>
								<li><a href="/templates" id="existingTemplate">From existing template</a></li>
							</ul>
						</div>
					</h1>
					<div class="container">			
						<table id="grid" class="table table-bordered datagrid">
							<thead>
							<tr>
								<th>
									<span class="datagrid-header-title">Messages</span>
						 
									<div class="datagrid-header-left">
										<div class="input-append search datagrid-search">
											<input type="text" class="input-medium" placeholder="Search">
											<button type="button" class="btn"><i class="icon-search"></i></button>
										</div>
									</div>
									<div class="datagrid-header-right">
										<div class="select filter" data-resize="auto">
											<button type="button" data-toggle="dropdown" class="btn dropdown-toggle">
												<span class="dropdown-label"></span>
												<span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<li data-value="all" data-selected="true"><a href="#">All</a></li>
												<li data-value="type"><a href="#">Message Type</a></li>
												<li data-value="type"><a href="#">Recent Messages</a></li>
												<li data-value="type"><a href="#">Favorite</a></li>
											</ul>
										</div>
									</div>
								</th>
							</tr>
							</thead>
							<tfoot>
							<tr>
								<th>
									<div class="datagrid-footer-left" style="display:none;">
										<div class="grid-controls">
											<span>
												<span class="grid-start"></span> -
												<span class="grid-end"></span> of
												<span class="grid-count"></span>
											</span>
											<div class="select grid-pagesize" data-resize="auto">
												<button type="button" data-toggle="dropdown" class="btn dropdown-toggle">
													<span class="dropdown-label"></span>
													<span class="caret"></span>
												</button>
												<ul class="dropdown-menu">
													<li data-value="5"><a href="#">5</a></li>
													<li data-value="10"><a href="#">10</a></li>
													<li data-value="20" data-selected="true"><a href="#">20</a></li>
													<li data-value="50"><a href="#">50</a></li>
													<li data-value="100"><a href="#">100</a></li>
												</ul>
											</div>
											<span>Per Page</span>
										</div>
									</div>
									<div class="datagrid-footer-right" style="display:none;">
										<div class="grid-pager">
											<button type="button" class="btn grid-prevpage"><i class="icon-chevron-left"></i></button>
											<span>Page</span>
						 
											<div class="input-append dropdown combobox">
												<input class="span1" type="text">
												<button type="button" class="btn" data-toggle="dropdown"><i class="caret"></i></button>
												<ul class="dropdown-menu"></ul>
											</div>
											<span>of <span class="grid-pages"></span></span>
											<button type="button" class="btn grid-nextpage"><i class="icon-chevron-right"></i></button>
										</div>
									</div>
								</th>
							</tr>
							</tfoot>
						</table>	
					</div>
				</div>
			</div>
		</div>

		<script src="/js/datasource.js"></script>
		<script src="/js/index.js"></script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/footer.php'; ?>
