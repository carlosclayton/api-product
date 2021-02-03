<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Imbo\BehatApiExtension\Context\ApiContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends ApiContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }


    /**
     * @Then Eu devo receber o código :arg1
     */
    public function euDevoReceberOCodigo($arg1)
    {
        $this->assertResponseCodeIs($arg1);

    }



    /**
     * @Given Que eu faço um :arg1 no endpoint :arg2
     */
    public function queEuFacoUmNoEndpoint($arg1, $arg2)
    {
        $this->requestPath($arg2, $arg1);
    }

    /**
     * @Given passo um produto
     */
    public function passoUmProduto()
    {

    }


    /**
     * @Given que eu tenha um produto
     */
    public function queEuTenhaUmProduto()
    {
        $this->setRequestFormParams(new TableNode([
            ['name', 'value'],
            ['name', 'testando']
        ]));
    }

    /**
     * @Given faço um :arg1 no endpoint :arg2
     */
    public function facoUmNoEndpoint($arg1, $arg2)
    {
        $this->requestPath($arg2, $arg1);
    }



}
