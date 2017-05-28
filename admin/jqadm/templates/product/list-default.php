<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2016
 */

$enc = $this->encoder();


$checked = function( array $list, $code ) {
	return ( in_array( $code, $list ) ? 'checked="checked"' : '' );
};

$selected = function( $key, $code ) {
	return ( (string) $key === (string) $code ? 'selected="selected"' : '' );
};

$sort = function( $sortcode, $code ) {
	return ( $sortcode === $code ? '-' . $code : $code );
};

$sortclass = function( $sortcode, $code ) {
	if( $sortcode === $code ) {
		return 'sort-desc';
	}
	if( $sortcode === '-' . $code ) {
		return 'sort-asc';
	}
};

/** admin/jqadm/url/search/target
 * Destination of the URL where the controller specified in the URL is known
 *
 * The destination can be a page ID like in a content management system or the
 * module of a software development framework. This "target" must contain or know
 * the controller that should be called by the generated URL.
 *
 * @param string Destination of the URL
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/search/controller
 * @see admin/jqadm/url/search/action
 * @see admin/jqadm/url/search/config
 */
$target = $this->config( 'admin/jqadm/url/search/target' );

/** admin/jqadm/url/search/controller
 * Name of the controller whose action should be called
 *
 * In Model-View-Controller (MVC) applications, the controller contains the methods
 * that create parts of the output displayed in the generated HTML page. Controller
 * names are usually alpha-numeric.
 *
 * @param string Name of the controller
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/search/target
 * @see admin/jqadm/url/search/action
 * @see admin/jqadm/url/search/config
 */
$controller = $this->config( 'admin/jqadm/url/search/controller', 'Jqadm' );

/** admin/jqadm/url/search/action
 * Name of the action that should create the output
 *
 * In Model-View-Controller (MVC) applications, actions are the methods of a
 * controller that create parts of the output displayed in the generated HTML page.
 * Action names are usually alpha-numeric.
 *
 * @param string Name of the action
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/search/target
 * @see admin/jqadm/url/search/controller
 * @see admin/jqadm/url/search/config
 */
$action = $this->config( 'admin/jqadm/url/search/action', 'search' );

/** admin/jqadm/url/search/config
 * Associative list of configuration options used for generating the URL
 *
 * You can specify additional options as key/value pairs used when generating
 * the URLs, like
 *
 *  admin/jqadm/url/search/config = ['absoluteUri' => true )
 *
 * The available key/value pairs depend on the application that embeds the e-commerce
 * framework. This is because the infrastructure of the application is used for
 * generating the URLs. The full list of available config options is referenced
 * in the "see also" section of this page.
 *
 * @param string Associative list of configuration options
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/search/target
 * @see admin/jqadm/url/search/controller
 * @see admin/jqadm/url/search/action
 */
$config = $this->config( 'admin/jqadm/url/search/config', [] );


/** admin/jqadm/url/create/target
 * Destination of the URL where the controller specified in the URL is known
 *
 * The destination can be a page ID like in a content management system or the
 * module of a software development framework. This "target" must contain or know
 * the controller that should be called by the generated URL.
 *
 * @param string Destination of the URL
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/create/controller
 * @see admin/jqadm/url/create/action
 * @see admin/jqadm/url/create/config
 */
$newTarget = $this->config( 'admin/jqadm/url/create/target' );

/** admin/jqadm/url/create/controller
 * Name of the controller whose action should be called
 *
 * In Model-View-Controller (MVC) applications, the controller contains the methods
 * that create parts of the output displayed in the generated HTML page. Controller
 * names are usually alpha-numeric.
 *
 * @param string Name of the controller
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/create/target
 * @see admin/jqadm/url/create/action
 * @see admin/jqadm/url/create/config
 */
$newCntl = $this->config( 'admin/jqadm/url/create/controller', 'Jqadm' );

/** admin/jqadm/url/create/action
 * Name of the action that should create the output
 *
 * In Model-View-Controller (MVC) applications, actions are the methods of a
 * controller that create parts of the output displayed in the generated HTML page.
 * Action names are usually alpha-numeric.
 *
 * @param string Name of the action
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/create/target
 * @see admin/jqadm/url/create/controller
 * @see admin/jqadm/url/create/config
 */
$newAction = $this->config( 'admin/jqadm/url/create/action', 'create' );

/** admin/jqadm/url/create/config
 * Associative list of configuration options used for generating the URL
 *
 * You can specify additional options as key/value pairs used when generating
 * the URLs, like
 *
 *  admin/jqadm/url/create/config = ['absoluteUri' => true]
 *
 * The available key/value pairs depend on the application that embeds the e-commerce
 * framework. This is because the infrastructure of the application is used for
 * generating the URLs. The full list of available config options is referenced
 * in the "see also" section of this page.
 *
 * @param string Associative list of configuration options
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/create/target
 * @see admin/jqadm/url/create/controller
 * @see admin/jqadm/url/create/action
 */
$newConfig = $this->config( 'admin/jqadm/url/create/config', [] );


/** admin/jqadm/url/get/target
 * Destination of the URL where the controller specified in the URL is known
 *
 * The destination can be a page ID like in a content management system or the
 * module of a software development framework. This "target" must contain or know
 * the controller that should be called by the generated URL.
 *
 * @param string Destination of the URL
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/get/controller
 * @see admin/jqadm/url/get/action
 * @see admin/jqadm/url/get/config
 */
$getTarget = $this->config( 'admin/jqadm/url/get/target' );

/** admin/jqadm/url/get/controller
 * Name of the controller whose action should be called
 *
 * In Model-View-Controller (MVC) applications, the controller contains the methods
 * that create parts of the output displayed in the generated HTML page. Controller
 * names are usually alpha-numeric.
 *
 * @param string Name of the controller
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/get/target
 * @see admin/jqadm/url/get/action
 * @see admin/jqadm/url/get/config
 */
$getCntl = $this->config( 'admin/jqadm/url/get/controller', 'Jqadm' );

/** admin/jqadm/url/get/action
 * Name of the action that should create the output
 *
 * In Model-View-Controller (MVC) applications, actions are the methods of a
 * controller that create parts of the output displayed in the generated HTML page.
 * Action names are usually alpha-numeric.
 *
 * @param string Name of the action
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/get/target
 * @see admin/jqadm/url/get/controller
 * @see admin/jqadm/url/get/config
 */
$getAction = $this->config( 'admin/jqadm/url/get/action', 'get' );

/** admin/jqadm/url/get/config
 * Associative list of configuration options used for generating the URL
 *
 * You can specify additional options as key/value pairs used when generating
 * the URLs, like
 *
 *  admin/jqadm/url/get/config = ['absoluteUri' => true]
 *
 * The available key/value pairs depend on the application that embeds the e-commerce
 * framework. This is because the infrastructure of the application is used for
 * generating the URLs. The full list of available config options is referenced
 * in the "see also" section of this page.
 *
 * @param string Associative list of configuration options
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/get/target
 * @see admin/jqadm/url/get/controller
 * @see admin/jqadm/url/get/action
 */
$getConfig = $this->config( 'admin/jqadm/url/get/config', [] );


/** admin/jqadm/url/copy/target
 * Destination of the URL where the controller specified in the URL is known
 *
 * The destination can be a page ID like in a content management system or the
 * module of a software development framework. This "target" must contain or know
 * the controller that should be called by the generated URL.
 *
 * @param string Destination of the URL
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/copy/controller
 * @see admin/jqadm/url/copy/action
 * @see admin/jqadm/url/copy/config
 */
$copyTarget = $this->config( 'admin/jqadm/url/copy/target' );

/** admin/jqadm/url/copy/controller
 * Name of the controller whose action should be called
 *
 * In Model-View-Controller (MVC) applications, the controller contains the methods
 * that create parts of the output displayed in the generated HTML page. Controller
 * names are usually alpha-numeric.
 *
 * @param string Name of the controller
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/copy/target
 * @see admin/jqadm/url/copy/action
 * @see admin/jqadm/url/copy/config
 */
$copyCntl = $this->config( 'admin/jqadm/url/copy/controller', 'Jqadm' );

/** admin/jqadm/url/copy/action
 * Name of the action that should create the output
 *
 * In Model-View-Controller (MVC) applications, actions are the methods of a
 * controller that create parts of the output displayed in the generated HTML page.
 * Action names are usually alpha-numeric.
 *
 * @param string Name of the action
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/copy/target
 * @see admin/jqadm/url/copy/controller
 * @see admin/jqadm/url/copy/config
 */
$copyAction = $this->config( 'admin/jqadm/url/copy/action', 'copy' );

/** admin/jqadm/url/copy/config
 * Associative list of configuration options used for generating the URL
 *
 * You can specify additional options as key/value pairs used when generating
 * the URLs, like
 *
 *  admin/jqadm/url/copy/config = ['absoluteUri' => true]
 *
 * The available key/value pairs depend on the application that embeds the e-commerce
 * framework. This is because the infrastructure of the application is used for
 * generating the URLs. The full list of available config options is referenced
 * in the "see also" section of this page.
 *
 * @param string Associative list of configuration options
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/copy/target
 * @see admin/jqadm/url/copy/controller
 * @see admin/jqadm/url/copy/action
 */
$copyConfig = $this->config( 'admin/jqadm/url/copy/config', [] );


/** admin/jqadm/url/delete/target
 * Destination of the URL where the controller specified in the URL is known
 *
 * The destination can be a page ID like in a content management system or the
 * module of a software development framework. This "target" must contain or know
 * the controller that should be called by the generated URL.
 *
 * @param string Destination of the URL
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/delete/controller
 * @see admin/jqadm/url/delete/action
 * @see admin/jqadm/url/delete/config
 */
$delTarget = $this->config( 'admin/jqadm/url/delete/target' );

/** admin/jqadm/url/delete/controller
 * Name of the controller whose action should be called
 *
 * In Model-View-Controller (MVC) applications, the controller contains the methods
 * that create parts of the output displayed in the generated HTML page. Controller
 * names are usually alpha-numeric.
 *
 * @param string Name of the controller
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/delete/target
 * @see admin/jqadm/url/delete/action
 * @see admin/jqadm/url/delete/config
 */
$delCntl = $this->config( 'admin/jqadm/url/delete/controller', 'Jqadm' );

/** admin/jqadm/url/delete/action
 * Name of the action that should create the output
 *
 * In Model-View-Controller (MVC) applications, actions are the methods of a
 * controller that create parts of the output displayed in the generated HTML page.
 * Action names are usually alpha-numeric.
 *
 * @param string Name of the action
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/delete/target
 * @see admin/jqadm/url/delete/controller
 * @see admin/jqadm/url/delete/config
 */
$delAction = $this->config( 'admin/jqadm/url/delete/action', 'delete' );

/** admin/jqadm/url/delete/config
 * Associative list of configuration options used for generating the URL
 *
 * You can specify additional options as key/value pairs used when generating
 * the URLs, like
 *
 *  admin/jqadm/url/delete/config = ['absoluteUri' => true]
 *
 * The available key/value pairs depend on the application that embeds the e-commerce
 * framework. This is because the infrastructure of the application is used for
 * generating the URLs. The full list of available config options is referenced
 * in the "see also" section of this page.
 *
 * @param string Associative list of configuration options
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/url/delete/target
 * @see admin/jqadm/url/delete/controller
 * @see admin/jqadm/url/delete/action
 */
$delConfig = $this->config( 'admin/jqadm/url/delete/config', [] );


$formparams = $params = $this->get( 'pageParams', [] );
unset( $formparams['fields'], $formparams['filter'], $formparams['page'] );


/** admin/jqadm/product/fields
 * List of product columns that should be displayed in the list view
 *
 * Changes the list of product columns shown by default in the product list view.
 * The columns can be changed by the editor as required within the administraiton
 * interface.
 *
 * The names of the colums are in fact the search keys defined by the managers,
 * e.g. "product.id" for the product ID.
 *
 * @param array List of field names, i.e. search keys
 * @since 2016.04
 * @category Developer
 */
$default = $this->config( 'admin/jqadm/product/fields', ['product.id', 'product.status', 'product.typeid', 'product.code', 'product.label'] );
$fields = $this->param( 'fields', $default );

$pageParams = ['total' => $this->get( 'total', 0 ), 'pageParams' => $params];
$sortcode = $this->param( 'sort' );


/** admin/jqadm/partial/filter
 * Relative path to the partial template for displaying the product filter
 *
 * The template file contains the HTML code and processing instructions
 * to generate the result shown in the administration interface. The
 * configuration string is the path to the template file relative
 * to the templates directory (usually in admin/jqadm/templates).
 *
 * You can overwrite the template file configuration in extensions and
 * provide alternative templates. These alternative templates should be
 * named like the default one but with the string "default" replaced by
 * an unique name. You may use the name of your project for this. If
 * you've implemented an alternative client class as well, "default"
 * should be replaced by the name of the new class.
 *
 * @param string Relative path to the partial creating the HTML code
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/partial/confirm
 * @see admin/jqadm/partial/error
 */

/** admin/jqadm/partial/pagination
 * Relative path to the partial template for displaying the pagination
 *
 * The template file contains the HTML code and processing instructions
 * to generate the result shown in the administration interface. The
 * configuration string is the path to the template file relative
 * to the templates directory (usually in admin/jqadm/templates).
 *
 * You can overwrite the template file configuration in extensions and
 * provide alternative templates. These alternative templates should be
 * named like the default one but with the string "default" replaced by
 * an unique name. You may use the name of your project for this. If
 * you've implemented an alternative client class as well, "default"
 * should be replaced by the name of the new class.
 *
 * @param string Relative path to the partial creating the HTML code
 * @since 2016.04
 * @category Developer
 * @see admin/jqadm/partial/filter
 * @see admin/jqadm/partial/confirm
 * @see admin/jqadm/partial/error
 */

/** admin/jqadm/template/page
 * Relative path to the template for the base page template
 *
 * The template file contains the HTML code and processing instructions
 * to generate the result shown in the administration interface. The
 * configuration string is the path to the template file relative
 * to the templates directory (usually in admin/jqadm/templates).
 *
 * You can overwrite the template file configuration in extensions and
 * provide alternative templates. These alternative templates should be
 * named like the default one but with the string "default" replaced by
 * an unique name. You may use the name of your project for this. If
 * you've implemented an alternative client class as well, "default"
 * should be replaced by the name of the new class.
 *
 * @param string Relative path to the partial creating the HTML code
 * @since 2016.04
 * @category Developer
 */

?>
<?php $this->block()->start( 'jqadm_content' ); ?>

<nav class="main-navbar">

	<span class="navbar-brand">
		<?= $enc->html( $this->translate( 'admin', 'Product' ) ); ?>
		<span class="navbar-secondary">(<?= $enc->html( $this->site()->label() ); ?>)</span>
	</span>

	<form class="form-inline" method="POST" action="<?= $enc->attr( $this->url( $target, $controller, $action, $formparams, [], $config ) ); ?>">
		<?= $this->csrf()->formfield(); ?>

		<i class="fa more"></i>

		<div class="dropdown filter-columns">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
				data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?= $enc->html( $this->translate( 'admin', 'Columns' ) ); ?>
			</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<li class="dropdown-item">
					<label>
						<input type="checkbox"
							name="<?= $enc->attr( $this->formparam( ['fields', ''] ) ); ?>"
							value="product.id" <?= $checked( $fields, 'product.id' ); ?> />
						<?= $enc->html( $this->translate( 'admin', 'ID' ) ); ?>
					</label>
				</li>
				<li class="dropdown-item">
					<label>
						<input type="checkbox"
							name="<?= $enc->attr( $this->formparam( ['fields', ''] ) ); ?>"
							value="product.status" <?= $checked( $fields, 'product.status' ); ?> />
						<?= $enc->html( $this->translate( 'admin', 'Status' ) ); ?>
					</label>
				</li>
				<li class="dropdown-item">
					<label>
						<input type="checkbox"
							name="<?= $enc->attr( $this->formparam( ['fields', ''] ) ); ?>"
							value="product.typeid" <?= $checked( $fields, 'product.typeid' ); ?> />
						<?= $enc->html( $this->translate( 'admin', 'Type' ) ); ?>
					</label>
				</li>
				<li class="dropdown-item">
					<label>
						<input type="checkbox"
							name="<?= $enc->attr( $this->formparam( ['fields', ''] ) ); ?>"
							value="product.code" <?= $checked( $fields, 'product.code' ); ?> />
						<?= $enc->html( $this->translate( 'admin', 'Code' ) ); ?>
					</label>
				</li>
				<li class="dropdown-item">
					<label>
						<input type="checkbox"
							name="<?= $enc->attr( $this->formparam( ['fields', ''] ) ); ?>"
							value="product.label" <?= $checked( $fields, 'product.label' ); ?> />
						<?= $enc->html( $this->translate( 'admin', 'Label' ) ); ?>
					</label>
				</li>
				<li class="dropdown-item">
					<label>
						<input type="checkbox"
							name="<?= $enc->attr( $this->formparam( ['fields', ''] ) ); ?>"
							value="product.datestart" <?= $checked( $fields, 'product.datestart' ); ?> />
						<?= $enc->html( $this->translate( 'admin', 'Start date' ) ); ?>
					</label>
				</li>
				<li class="dropdown-item">
					<label>
						<input type="checkbox"
							name="<?= $enc->attr( $this->formparam( ['fields', ''] ) ); ?>"
							value="product.dateend" <?= $checked( $fields, 'product.dateend' ); ?> />
						<?= $enc->html( $this->translate( 'admin', 'End date' ) ); ?>
					</label>
				</li>
				<li class="dropdown-item">
					<label>
						<input type="checkbox"
							name="<?= $enc->attr( $this->formparam( ['fields', ''] ) ); ?>"
							value="product.ctime" <?= $checked( $fields, 'product.ctime' ); ?> />
						<?= $enc->html( $this->translate( 'admin', 'Created' ) ); ?>
					</label>
				</li>
				<li class="dropdown-item">
					<label>
						<input type="checkbox"
							name="<?= $enc->attr( $this->formparam( ['fields', ''] ) ); ?>"
							value="product.mtime" <?= $checked( $fields, 'product.mtime' ); ?> />
						<?= $enc->html( $this->translate( 'admin', 'Last modified' ) ); ?>
					</label>
				</li>
				<li class="dropdown-item">
					<label>
						<input type="checkbox"
							name="<?= $enc->attr( $this->formparam( ['fields', ''] ) ); ?>"
							value="product.editor" <?= $checked( $fields, 'product.editor' ); ?> />
						<?= $enc->html( $this->translate( 'admin', 'Editor' ) ); ?>
					</label>
				</li>
			</ul>
		</div>

		<div class="input-group">
			<select class="custom-select filter-key" name="<?= $this->formparam( ['filter', 'key', ''] ); ?>">
				<?php foreach( $this->get( 'filterAttributes', [] ) as $code => $attrItem ) : ?>
					<?php if( $attrItem->isPublic() ) : ?>
						<option value="<?= $enc->attr( $code ); ?>" data-type="<?= $enc->attr( $attrItem->getType() ); ?>" <?= ( isset( $filter['key'] ) && $filter['key'] === $code ? 'selected' : '' ); ?> >
							<?= $enc->html( $this->translate( 'admin/ext', $attrItem->getLabel() ) ); ?>
						</option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
			<select class="custom-select filter-operator" name="<?= $this->formparam( ['filter', 'op', ''] ); ?>">
				<?php foreach( $this->get( 'filterOperators/compare', [] ) as $code ) : ?>
					<option value="<?= $enc->attr( $code ); ?>" <?= ( isset( $filter['op'] ) && $filter['op'] === $code ? 'selected' : '' ); ?> >
						<?= $enc->html( $code ) . ( strlen( $code ) === 1 ? '&nbsp;' : '' ); ?>&nbsp;&nbsp;<?= $enc->html( $this->translate( 'admin/ext', $code ) ); ?>
					</option>
				<?php endforeach; ?>
			</select>
			<input type="text" class="form-control filter-value" name="<?= $this->formparam( ['filter', 'val', ''] ); ?>"
				 value="<?= $enc->attr( ( isset( $filter['val'] ) ? $filter['val'] : '' ) ); ?>" >
			<button class="input-group-addon btn btn-primary fa fa-search"></button>
		</div>

	</form>

</nav>


<?= $this->partial( $this->config( 'admin/jqadm/partial/pagination', 'common/partials/pagination-default.php' ), $pageParams + ['pos' => 'top'] ); ?>

<?php $searchParam = $params; unset( $searchParam['filter'] ); ?>
<form method="POST" action="<?= $enc->attr( $this->url( $target, $controller, $action, $params, [], $config ) ); ?>">
	<?= $this->csrf()->formfield(); ?>

	<div class="table-responsive">
		<table class="list-items table table-hover table-striped">
			<thead class="list-header">
				<tr>
					<?php if( in_array( 'product.id', $fields ) ) : ?>
						<th class="product-id">
							<a class="<?= $sortclass( $sortcode, 'product.id' ); ?>"
								href="<?= $enc->attr( $this->url( $target, $controller, $action, ['sort' => $sort( $sortcode, 'product.id' )] + $params, [], $config ) ); ?>">
								<?= $enc->html( $this->translate( 'admin', 'ID' ) ); ?>
							</a>
						</th>
					<?php endif; ?>
					<?php if( in_array( 'product.status', $fields ) ) : ?>
						<th class="product-status">
							<a class="<?= $sortclass( $sortcode, 'product.status' ); ?>"
								href="<?= $enc->attr( $this->url( $target, $controller, $action, ['sort' => $sort( $sortcode, 'product.status' )] + $params, [], $config ) ); ?>">
								<?= $enc->html( $this->translate( 'admin', 'Status' ) ); ?>
							</a>
						</th>
					<?php endif; ?>
					<?php if( in_array( 'product.typeid', $fields ) ) : ?>
						<th class="product-type">
							<a class="<?= $sortclass( $sortcode, 'product.type' ); ?>"
								href="<?= $enc->attr( $this->url( $target, $controller, $action, ['sort' => $sort( $sortcode, 'product.typeid' )] + $params, [], $config ) ); ?>">
								<?= $enc->html( $this->translate( 'admin', 'Type' ) ); ?>
							</a>
						</th>
					<?php endif; ?>
					<?php if( in_array( 'product.code', $fields ) ) : ?>
						<th class="product-code">
							<a class="<?= $sortclass( $sortcode, 'product.code' ); ?>"
								href="<?= $enc->attr( $this->url( $target, $controller, $action, ['sort' => $sort( $sortcode, 'product.code' )] + $params, [], $config ) ); ?>">
								<?= $enc->html( $this->translate( 'admin', 'Code' ) ); ?>
							</a>
						</th>
					<?php endif; ?>
					<?php if( in_array( 'product.label', $fields ) ) : ?>
						<th class="product-label">
							<a class="<?= $sortclass( $sortcode, 'product.label' ); ?>"
								href="<?= $enc->attr( $this->url( $target, $controller, $action, ['sort' => $sort( $sortcode, 'product.label' )] + $params, [], $config ) ); ?>">
								<?= $enc->html( $this->translate( 'admin', 'Label' ) ); ?>
							</a>
						</th>
					<?php endif; ?>
					<?php if( in_array( 'product.datestart', $fields ) ) : ?>
						<th class="product-datestart">
							<a class="<?= $sortclass( $sortcode, 'product.datestart' ); ?>"
								href="<?= $enc->attr( $this->url( $target, $controller, $action, ['sort' => $sort( $sortcode, 'product.datestart' )] + $params, [], $config ) ); ?>">
								<?= $enc->html( $this->translate( 'admin', 'Start date' ) ); ?>
							</a>
						</th>
					<?php endif; ?>
					<?php if( in_array( 'product.dateend', $fields ) ) : ?>
						<th class="product-dateend">
							<a class="<?= $sortclass( $sortcode, 'product.dateend' ); ?>"
								href="<?= $enc->attr( $this->url( $target, $controller, $action, ['sort' => $sort( $sortcode, 'product.dateend' )] + $params, [], $config ) ); ?>">
								<?= $enc->html( $this->translate( 'admin', 'End date' ) ); ?>
							</a>
						</th>
					<?php endif; ?>
					<?php if( in_array( 'product.ctime', $fields ) ) : ?>
						<th class="product-ctime">
							<a class="<?= $sortclass( $sortcode, 'product.ctime' ); ?>"
								href="<?= $enc->attr( $this->url( $target, $controller, $action, ['sort' => $sort( $sortcode, 'product.ctime' )] + $params, [], $config ) ); ?>">
								<?= $enc->html( $this->translate( 'admin', 'Created' ) ); ?>
							</a>
						</th>
					<?php endif; ?>
					<?php if( in_array( 'product.mtime', $fields ) ) : ?>
						<th class="product-mtime">
							<a class="<?= $sortclass( $sortcode, 'product.mtime' ); ?>"
								href="<?= $enc->attr( $this->url( $target, $controller, $action, ['sort' => $sort( $sortcode, 'product.mtime' )] + $params, [], $config ) ); ?>">
								<?= $enc->html( $this->translate( 'admin', 'Last modified' ) ); ?>
							</a>
						</th>
					<?php endif; ?>
					<?php if( in_array( 'product.editor', $fields ) ) : ?>
						<th class="product-editor">
							<a class="<?= $sortclass( $sortcode, 'product.editor' ); ?>"
								href="<?= $enc->attr( $this->url( $target, $controller, $action, ['sort' => $sort( $sortcode, 'product.editor' )] + $params, [], $config ) ); ?>">
								<?= $enc->html( $this->translate( 'admin', 'Editor' ) ); ?>
							</a>
						</th>
					<?php endif; ?>
					<th class="actions">
						<a class="btn fa act-add"
							href="<?= $enc->attr( $this->url( $newTarget, $newCntl, $newAction, $params, [], $newConfig ) ); ?>"
							title="<?= $enc->attr( $this->translate( 'admin', 'Add new entry (Ctrl+a)') ); ?>"
							aria-label="<?= $enc->attr( $this->translate( 'admin', 'Add' ) ); ?>">
						</a>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr class="list-search">
					<?php if( in_array( 'product.id', $fields ) ) : ?>
						<td class="product-id">
							<input type="hidden" value="product.id"
								name="<?= $enc->attr( $this->formparam( ['filter', 'key', 0] ) ); ?>" />
							<input type="hidden" value="=="
								name="<?= $enc->attr( $this->formparam( ['filter', 'op', 0] ) ); ?>" />
							<input class="form-control" type="text" tabindex="2"
								name="<?= $enc->attr( $this->formparam( ['filter', 'val', 0] ) ); ?>"
								value="<?= $enc->attr( $this->param( 'filter/val/0' ) ); ?>" />
						</td>
					<?php endif; ?>
					<?php if( in_array( 'product.status', $fields ) ) : ?>
						<td class="product-status">
							<input type="hidden" value="product.status"
								name="<?= $enc->attr( $this->formparam( ['filter', 'key', 1] ) ); ?>" />
							<input type="hidden" value="=="
								name="<?= $enc->attr( $this->formparam( ['filter', 'op', 1] ) ); ?>" />
							<select class="form-control custom-select" tabindex="2"
								name="<?= $enc->attr( $this->formparam( ['filter', 'val', 1] ) ); ?>">
								<option value=""></option>
								<option value="1" <?= $selected( $this->param( 'filter/val/1' ), '1' ); ?> >
									<?= $enc->html( $this->translate( 'admin', 'status:enabled' ) ); ?>
								</option>
								<option value="0" <?= $selected( $this->param( 'filter/val/1' ), '0' ); ?> >
									<?= $enc->html( $this->translate( 'admin', 'status:disabled' ) ); ?>
								</option>
								<option value="-1" <?= $selected( $this->param( 'filter/val/1' ), '-1' ); ?> >
									<?= $enc->html( $this->translate( 'admin', 'status:review' ) ); ?>
								</option>
								<option value="-2" <?= $selected( $this->param( 'filter/val/1' ), '-2' ); ?> >
									<?= $enc->html( $this->translate( 'admin', 'status:archive' ) ); ?>
								</option>
							</select>
						</td>
					<?php endif; ?>
					<?php if( in_array( 'product.typeid', $fields ) ) : ?>
						<td class="product-typeid">
							<input type="hidden" value="product.typeid"
								name="<?= $enc->attr( $this->formparam( ['filter', 'key', 2] ) ); ?>" />
							<input type="hidden" value="=="
								name="<?= $enc->attr( $this->formparam( ['filter', 'op', 2] ) ); ?>" />
							<select class="form-control custom-select" tabindex="2"
								name="<?= $enc->attr( $this->formparam( ['filter', 'val', 2] ) ); ?>">
								<option value=""></option>

								<?php foreach( $this->get( 'itemTypes', [] ) as $typeId => $typeItem ) : ?>
									<option value="<?= $enc->attr( $typeId ); ?>" <?= $selected( $this->param( 'filter/val/2' ), $typeId ); ?> >
										<?= $enc->html( $typeItem->getCode() ); ?>
									</option>
								<?php endforeach; ?>
							</select>
						</td>
					<?php endif; ?>
					<?php if( in_array( 'product.code', $fields ) ) : ?>
						<td class="product-code">
							<input type="hidden" value="product.code"
								name="<?= $enc->attr( $this->formparam( ['filter', 'key', 3] ) ); ?>" />
							<input type="hidden" value="=~"
								name="<?= $enc->attr( $this->formparam( ['filter', 'op', 3] ) ); ?>" />
							<input class="form-control" type="text" tabindex="2"
								name="<?= $enc->attr( $this->formparam( ['filter', 'val', 3] ) ); ?>"
								value="<?= $enc->attr( $this->param( 'filter/val/3' ) ); ?>" />
						</td>
					<?php endif; ?>
					<?php if( in_array( 'product.label', $fields ) ) : ?>
						<td class="product-label">
							<input type="hidden" value="product.label"
								name="<?= $enc->attr( $this->formparam( ['filter', 'key', 4] ) ); ?>" />
							<input type="hidden" value="=~"
								name="<?= $enc->attr( $this->formparam( ['filter', 'op', 4] ) ); ?>" />
							<input class="form-control" type="text" tabindex="2"
								name="<?= $enc->attr( $this->formparam( ['filter', 'val', 4] ) ); ?>"
								value="<?= $enc->attr( $this->param( 'filter/val/4' ) ); ?>" />
						</td>
					<?php endif; ?>
					<?php if( in_array( 'product.datestart', $fields ) ) : ?>
						<td class="product-datestart">
							<input type="hidden" value="product.datestart"
								name="<?= $enc->attr( $this->formparam( ['filter', 'key', 5] ) ); ?>" />
							<input type="hidden" value=">"
								name="<?= $enc->attr( $this->formparam( ['filter', 'op', 5] ) ); ?>" />
							<input class="form-control" type="datetime" tabindex="2"
								name="<?= $enc->attr( $this->formparam( ['filter', 'val', 5] ) ); ?>"
								value="<?= $enc->attr( $this->param( 'filter/val/5' ) ); ?>" />
						</td>
					<?php endif; ?>
					<?php if( in_array( 'product.dateend', $fields ) ) : ?>
						<td class="product-dateend">
							<input type="hidden" value="product.dateend"
								name="<?= $enc->attr( $this->formparam( ['filter', 'key', 6] ) ); ?>" />
							<input type="hidden" value=">"
								name="<?= $enc->attr( $this->formparam( ['filter', 'op', 6] ) ); ?>" />
							<input class="form-control" type="datetime" tabindex="2"
								name="<?= $enc->attr( $this->formparam( ['filter', 'val', 6] ) ); ?>"
								value="<?= $enc->attr( $this->param( 'filter/val/6' ) ); ?>" />
						</td>
					<?php endif; ?>
					<?php if( in_array( 'product.ctime', $fields ) ) : ?>
						<td class="product-ctime">
							<input type="hidden" value="product.ctime"
								name="<?= $enc->attr( $this->formparam( ['filter', 'key', 7] ) ); ?>" />
							<input type="hidden" value=">"
								name="<?= $enc->attr( $this->formparam( ['filter', 'op', 7] ) ); ?>" />
							<input class="form-control" type="datetime" tabindex="2"
								name="<?= $enc->attr( $this->formparam( ['filter', 'val', 7] ) ); ?>"
								value="<?= $enc->attr( $this->param( 'filter/val/7' ) ); ?>" />
						</td>
					<?php endif; ?>
					<?php if( in_array( 'product.mtime', $fields ) ) : ?>
						<td class="product-mtime">
							<input type="hidden" value="product.mtime"
								name="<?= $enc->attr( $this->formparam( ['filter', 'key', 8] ) ); ?>" />
							<input type="hidden" value=">"
								name="<?= $enc->attr( $this->formparam( ['filter', 'op', 8] ) ); ?>" />
							<input class="form-control" type="datetime" tabindex="2"
								name="<?= $enc->attr( $this->formparam( ['filter', 'val', 8] ) ); ?>"
								value="<?= $enc->attr( $this->param( 'filter/val/8' ) ); ?>" />
						</td>
					<?php endif; ?>
					<?php if( in_array( 'product.editor', $fields ) ) : ?>
						<td class="product-editor">
							<input type="hidden" value="product.editor"
								name="<?= $enc->attr( $this->formparam( ['filter', 'key', 9] ) ); ?>" />
							<input type="hidden" value=">"
								name="<?= $enc->attr( $this->formparam( ['filter', 'op', 9] ) ); ?>" />
							<input class="form-control" type="text" tabindex="2"
								name="<?= $enc->attr( $this->formparam( ['filter', 'val', 9] ) ); ?>"
								value="<?= $enc->attr( $this->param( 'filter/val/9' ) ); ?>" />
						</td>
					<?php endif; ?>

					<td class="actions">
						<a class="btn act-reset fa"
							href="<?= $enc->attr( $this->url( $target, $controller, $action, $searchParam, [], $config ) ); ?>"
							title="<?= $enc->attr( $this->translate( 'admin', 'Reset search') ); ?>"
							aria-label="<?= $enc->attr( $this->translate( 'admin', 'Reset' ) ); ?>"></a>
						<button class="btn act-search fa"
							title="<?= $enc->attr( $this->translate( 'admin', 'Search entries') ); ?>"
							aria-label="<?= $enc->attr( $this->translate( 'admin', 'Search' ) ); ?>">
						</button>
					</td>
				</tr>

				<?php foreach( $this->get( 'items', [] ) as $id => $item ) : ?>
					<?php $url = $enc->attr( $this->url( $getTarget, $getCntl, $getAction, ['id' => $id] + $params, [], $getConfig ) ); ?>
					<tr class="<?= $this->site()->readonly( $item->getSiteId() ); ?>">
						<?php if( in_array( 'product.id', $fields ) ) : ?>
							<td class="product-id"><a class="items-field" href="<?= $url; ?>"><?= $enc->html( $item->getId() ); ?></a></td>
						<?php endif; ?>
						<?php if( in_array( 'product.status', $fields ) ) : ?>
							<td class="product-status"><a class="items-field" href="<?= $url; ?>"><div class="fa status-<?= $enc->attr( $item->getStatus() ); ?>"></div></a></td>
						<?php endif; ?>
						<?php if( in_array( 'product.typeid', $fields ) ) : ?>
							<td class="product-type"><a class="items-field" href="<?= $url; ?>"><?= $enc->html( $item->getType() ); ?></a></td>
						<?php endif; ?>
						<?php if( in_array( 'product.code', $fields ) ) : ?>
							<td class="product-code"><a class="items-field" href="<?= $url; ?>"><?= $enc->html( $item->getCode() ); ?></a></td>
						<?php endif; ?>
						<?php if( in_array( 'product.label', $fields ) ) : ?>
							<td class="product-label"><a class="items-field" href="<?= $url; ?>"><?= $enc->html( $item->getLabel() ); ?></a></td>
						<?php endif; ?>
						<?php if( in_array( 'product.datestart', $fields ) ) : ?>
							<td class="product-datestart"><a class="items-field" href="<?= $url; ?>"><?= $enc->html( $item->getDateStart() ); ?></a></td>
						<?php endif; ?>
						<?php if( in_array( 'product.dateend', $fields ) ) : ?>
							<td class="product-dateend"><a class="items-field" href="<?= $url; ?>"><?= $enc->html( $item->getDateEnd() ); ?></a></td>
						<?php endif; ?>
						<?php if( in_array( 'product.ctime', $fields ) ) : ?>
							<td class="product-ctime"><a class="items-field" href="<?= $url; ?>"><?= $enc->html( $item->getTimeCreated() ); ?></a></td>
						<?php endif; ?>
						<?php if( in_array( 'product.mtime', $fields ) ) : ?>
							<td class="product-mtime"><a class="items-field" href="<?= $url; ?>"><?= $enc->html( $item->getTimeModified() ); ?></a></td>
						<?php endif; ?>
						<?php if( in_array( 'product.editor', $fields ) ) : ?>
							<td class="product-editor"><a class="items-field" href="<?= $url; ?>"><?= $enc->html( $item->getEditor() ); ?></a></td>
						<?php endif; ?>

						<td class="actions"><!--
							<?php if( !$this->site()->readonly( $item->getSiteId() ) ) : ?>
								--><a class="btn act-delete fa"
									href="<?= $enc->attr( $this->url( $delTarget, $delCntl, $delAction, ['resource' => 'product', 'id' => $id] + $params, [], $delConfig ) ); ?>"
									title="<?= $enc->attr( $this->translate( 'admin', 'Delete this entry') ); ?>"
									aria-label="<?= $enc->attr( $this->translate( 'admin', 'Delete' ) ); ?>"></a><!--
							<?php endif; ?>
							--><a class="btn act-copy fa"
								href="<?= $enc->attr( $this->url( $copyTarget, $copyCntl, $copyAction, ['id' => $id] + $params, [], $copyConfig ) ); ?>"
								title="<?= $enc->attr( $this->translate( 'admin', 'Copy this entry') ); ?>"
								aria-label="<?= $enc->attr( $this->translate( 'admin', 'Copy' ) ); ?>"></a><!--
						--></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<?php if( $this->get( 'items', [] ) === [] ) : ?>
			<?= $enc->html( sprintf( $this->translate( 'admin', 'No items found' ) ) ); ?>
		<?php endif; ?>
	</div>
</form>

<?= $this->partial( $this->config( 'admin/jqadm/partial/pagination', 'common/partials/pagination-default.php' ), $pageParams + ['pos' => 'bottom'] ); ?>

<?php $this->block()->stop(); ?>

<?= $this->render( $this->config( 'admin/jqadm/template/page', 'common/page-default.php' ) ); ?>
