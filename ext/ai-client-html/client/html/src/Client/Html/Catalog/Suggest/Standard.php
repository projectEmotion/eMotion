<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2016
 * @package Client
 * @subpackage Html
 */


namespace Aimeos\Client\Html\Catalog\Suggest;


/**
 * Default implementation of catalog suggest section HTML clients.
 *
 * @package Client
 * @subpackage Html
 */
class Standard
	extends \Aimeos\Client\Html\Common\Client\Factory\Base
	implements \Aimeos\Client\Html\Common\Client\Factory\Iface
{
	/** client/html/catalog/suggest/standard/subparts
	 * List of HTML sub-clients rendered within the catalog suggest client
	 *
	 * The output of the frontend is composed of the code generated by the HTML
	 * clients. Each HTML client can consist of serveral (or none) sub-clients
	 * that are responsible for rendering certain sub-parts of the output. The
	 * sub-clients can contain HTML clients themselves and therefore a
	 * hierarchical tree of HTML clients is composed. Each HTML client creates
	 * the output that is placed inside the container of its parent.
	 *
	 * At first, always the HTML code generated by the parent is printed, then
	 * the HTML code of its sub-clients. The order of the HTML sub-clients
	 * determines the order of the output of these sub-clients inside the parent
	 * container. If the configured list of clients is
	 *
	 *  array( "subclient1", "subclient2" )
	 *
	 * you can easily change the order of the output by reordering the subparts:
	 *
	 *  client/html/<clients>/subparts = array( "subclient1", "subclient2" )
	 *
	 * You can also remove one or more parts if they shouldn't be rendered:
	 *
	 *  client/html/<clients>/subparts = array( "subclient1" )
	 *
	 * As the clients only generates structural HTML, the layout defined via CSS
	 * should support adding, removing or reordering content by a fluid like
	 * design.
	 *
	 * Note: Up to 2015-02, this configuration option was available as
	 * client/html/catalog/lists/simple/subparts
	 *
	 * @param array List of sub-client names
	 * @since 2015.02
	 * @category Developer
	 */
	private $subPartPath = 'client/html/catalog/suggest/standard/subparts';
	private $subPartNames = [];
	private $cache;


	/**
	 * Returns the HTML code for insertion into the body.
	 *
	 * @param string $uid Unique identifier for the output if the content is placed more than once on the same page
	 * @param array &$tags Result array for the list of tags that are associated to the output
	 * @param string|null &$expire Result variable for the expiration date of the output (null for no expiry)
	 * @return string HTML code
	 */
	public function getBody( $uid = '', array &$tags = [], &$expire = null )
	{
		try
		{
			$view = $this->setViewParams( $this->getView(), $tags, $expire );

			$html = '';
			foreach( $this->getSubClients() as $subclient ) {
				$html .= $subclient->setView( $view )->getBody( $uid, $tags, $expire );
			}
			$view->suggestBody = $html;
		}
		catch( \Exception $e )
		{
			$this->getContext()->getLogger()->log( $e->getMessage() . PHP_EOL . $e->getTraceAsString() );
			return;
		}

		/** client/html/catalog/suggest/standard/template-body
		 * Relative path to the HTML body template of the catalog suggest client.
		 *
		 * The template file contains the HTML code and processing instructions
		 * to generate the result shown in the body of the frontend. The
		 * configuration string is the path to the template file relative
		 * to the templates directory (usually in client/html/templates).
		 *
		 * You can overwrite the template file configuration in extensions and
		 * provide alternative templates. These alternative templates should be
		 * named like the default one but with the string "standard" replaced by
		 * an unique name. You may use the name of your project for this. If
		 * you've implemented an alternative client class as well, "standard"
		 * should be replaced by the name of the new class.
		 *
		 * Note: Up to 2015-02, this configuration option was available as
		 * client/html/catalog/lists/simple/template-body
		 *
		 * @param string Relative path to the template creating code for the HTML page body
		 * @since 2015.02
		 * @category Developer
		 * @see client/html/catalog/suggest/standard/template-header
		 * @see client/html/catalog/suggest/domains
		 */
		$tplconf = 'client/html/catalog/suggest/standard/template-body';
		$default = 'catalog/suggest/body-default.php';

		return $view->render( $view->config( $tplconf, $default ) );
	}


	/**
	 * Returns the HTML string for insertion into the header.
	 *
	 * @param string $uid Unique identifier for the output if the content is placed more than once on the same page
	 * @param array &$tags Result array for the list of tags that are associated to the output
	 * @param string|null &$expire Result variable for the expiration date of the output (null for no expiry)
	 * @return string|null String including HTML tags for the header on error
	 */
	public function getHeader( $uid = '', array &$tags = [], &$expire = null )
	{
		try
		{
			$view = $this->setViewParams( $this->getView(), $tags, $expire );

			$html = '';
			foreach( $this->getSubClients() as $subclient ) {
				$html .= $subclient->setView( $view )->getHeader( $uid, $tags, $expire );
			}
			$view->suggestHeader = $html;
		}
		catch( \Exception $e )
		{
			$this->getContext()->getLogger()->log( $e->getMessage() . PHP_EOL . $e->getTraceAsString() );
			return;
		}

		/** client/html/catalog/suggest/standard/template-header
		 * Relative path to the HTML header template of the catalog suggest client.
		 *
		 * The template file contains the HTML code and processing instructions
		 * to generate the HTML code that is inserted into the HTML page header
		 * of the rendered page in the frontend. The configuration string is the
		 * path to the template file relative to the templates directory (usually
		 * in client/html/templates).
		 *
		 * You can overwrite the template file configuration in extensions and
		 * provide alternative templates. These alternative templates should be
		 * named like the default one but with the string "standard" replaced by
		 * an unique name. You may use the name of your project for this. If
		 * you've implemented an alternative client class as well, "standard"
		 * should be replaced by the name of the new class.
		 *
		 * Note: Up to 2015-02, this configuration option was available as
		 * client/html/catalog/lists/simple/template-header
		 *
		 * @param string Relative path to the template creating code for the HTML page head
		 * @since 2015.02
		 * @category Developer
		 * @see client/html/catalog/suggest/standard/template-body
		 * @see client/html/catalog/suggest/domains
		 */
		$tplconf = 'client/html/catalog/suggest/standard/template-header';
		$default = 'catalog/suggest/header-default.php';

		return $view->render( $view->config( $tplconf, $default ) );
	}


	/**
	 * Returns the sub-client given by its name.
	 *
	 * @param string $type Name of the client type
	 * @param string|null $name Name of the sub-client (Default if null)
	 * @return \Aimeos\Client\Html\Iface Sub-client object
	 */
	public function getSubClient( $type, $name = null )
	{
		/** client/html/catalog/suggest/decorators/excludes
		 * Excludes decorators added by the "common" option from the catalog suggest html client
		 *
		 * Decorators extend the functionality of a class by adding new aspects
		 * (e.g. log what is currently done), executing the methods of the underlying
		 * class only in certain conditions (e.g. only for logged in users) or
		 * modify what is returned to the caller.
		 *
		 * This option allows you to remove a decorator added via
		 * "client/html/common/decorators/default" before they are wrapped
		 * around the html client.
		 *
		 *  client/html/catalog/suggest/decorators/excludes = array( 'decorator1' )
		 *
		 * This would remove the decorator named "decorator1" from the list of
		 * common decorators ("\Aimeos\Client\Html\Common\Decorator\*") added via
		 * "client/html/common/decorators/default" to the html client.
		 *
		 * @param array List of decorator names
		 * @since 2015.02
		 * @category Developer
		 * @see client/html/common/decorators/default
		 * @see client/html/catalog/suggest/decorators/global
		 * @see client/html/catalog/suggest/decorators/local
		 */

		/** client/html/catalog/suggest/decorators/global
		 * Adds a list of globally available decorators only to the catalog suggest html client
		 *
		 * Decorators extend the functionality of a class by adding new aspects
		 * (e.g. log what is currently done), executing the methods of the underlying
		 * class only in certain conditions (e.g. only for logged in users) or
		 * modify what is returned to the caller.
		 *
		 * This option allows you to wrap global decorators
		 * ("\Aimeos\Client\Html\Common\Decorator\*") around the html client.
		 *
		 *  client/html/catalog/suggest/decorators/global = array( 'decorator1' )
		 *
		 * This would add the decorator named "decorator1" defined by
		 * "\Aimeos\Client\Html\Common\Decorator\Decorator1" only to the html client.
		 *
		 * @param array List of decorator names
		 * @since 2015.02
		 * @category Developer
		 * @see client/html/common/decorators/default
		 * @see client/html/catalog/suggest/decorators/excludes
		 * @see client/html/catalog/suggest/decorators/local
		 */

		/** client/html/catalog/suggest/decorators/local
		 * Adds a list of local decorators only to the catalog suggest html client
		 *
		 * Decorators extend the functionality of a class by adding new aspects
		 * (e.g. log what is currently done), executing the methods of the underlying
		 * class only in certain conditions (e.g. only for logged in users) or
		 * modify what is returned to the caller.
		 *
		 * This option allows you to wrap local decorators
		 * ("\Aimeos\Client\Html\Catalog\Decorator\*") around the html client.
		 *
		 *  client/html/catalog/suggest/decorators/local = array( 'decorator2' )
		 *
		 * This would add the decorator named "decorator2" defined by
		 * "\Aimeos\Client\Html\Catalog\Decorator\Decorator2" only to the html client.
		 *
		 * @param array List of decorator names
		 * @since 2015.02
		 * @category Developer
		 * @see client/html/common/decorators/default
		 * @see client/html/catalog/suggest/decorators/excludes
		 * @see client/html/catalog/suggest/decorators/global
		 */

		return $this->createSubClient( 'catalog/suggest/' . $type, $name );
	}


	/**
	 * Processes the input, e.g. store given values.
	 * A view must be available and this method doesn't generate any output
	 * besides setting view variables.
	 */
	public function process()
	{
		try
		{
			parent::process();
		}
		catch( \Exception $e )
		{
			$this->getContext()->getLogger()->log( $e->getMessage() . PHP_EOL . $e->getTraceAsString() );
		}
	}


	/**
	 * Returns the list of sub-client names configured for the client.
	 *
	 * @return array List of HTML client names
	 */
	protected function getSubClientNames()
	{
		return $this->getContext()->getConfig()->get( $this->subPartPath, $this->subPartNames );
	}


	/**
	 * Sets the necessary parameter values in the view.
	 *
	 * @param \Aimeos\MW\View\Iface $view The view object which generates the HTML output
	 * @param array &$tags Result array for the list of tags that are associated to the output
	 * @param string|null &$expire Result variable for the expiration date of the output (null for no expiry)
	 * @return \Aimeos\MW\View\Iface Modified view object
	 */
	protected function setViewParams( \Aimeos\MW\View\Iface $view, array &$tags = [], &$expire = null )
	{
		if( !isset( $this->cache ) )
		{
			$types = ['name'];
			$context = $this->getContext();
			$input = $view->param( 'f_search' );
			$langid = $context->getLocale()->getLanguageId();


			/** client/html/catalog/suggest/usecode
			 * Enables product suggestions based on using the product code
			 *
			 * The suggested entries for the full text search in the catalog filter component
			 * are based on the product names by default. By setting this option to true or 1,
			 * you can add suggestions based on the product codes as well.
			 *
			 * @param boolean True to search for product codes too, false for product names only
			 * @since 2016.09
			 * @category Developer
			 */

			if( $context->getConfig()->get( 'client/html/catalog/suggest/usecode', false ) ) {
				$types[] = 'code';
			}

			/** client/html/catalog/suggest/domains
			 * List of domain items that should be fetched along with the products
			 *
			 * The suggsted entries for the full text search in the catalog filter component
			 * usually consist of the names of the matched products. By default, only the
			 * product item including the localized name is available. You can add more domains
			 * like e.g. "media" to get the images of the product as well.
			 *
			 * '''Note:''' The more domains you will add, the slower the autocomplete requests
			 * will be! Keep it to an absolute minium for user friendly response times.
			 *
			 * @param array List of domain names
			 * @since 2016.08
			 * @category Developer
			 * @see client/html/catalog/suggest/standard/template-body
			 */
			$domains = $context->getConfig()->get( 'client/html/catalog/suggest/domains', array( 'text' ) );


			$controller = \Aimeos\Controller\Frontend\Factory::createController( $context, 'product' );

			$filter = $controller->createFilter( null, '+', 0, 24, 'default' );
			$expr = array(
				$filter->compare( '>', $filter->createFunction( 'index.text.relevance', array( 'default', $langid, $input ) ), 0 ),
				$filter->compare( '>', $filter->createFunction( 'index.text.value', array( 'default', $langid, $types, 'product' ) ), '' ),
			);
			$filter->setConditions( $filter->combine( '&&', $expr ) );

			$view->suggestItems = $controller->searchItems( $filter, $domains );

			$this->cache = $view;
		}

		return $this->cache;
	}
}
