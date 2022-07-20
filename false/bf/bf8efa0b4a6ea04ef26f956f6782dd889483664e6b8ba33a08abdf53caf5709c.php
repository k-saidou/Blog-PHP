<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* default.html.twig */
class __TwigTemplate_d3226c861d5d9d51cbdaac2ca06be81a4a09da04088101588af5b17681d62a5a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\" />
        <meta name=\"description\" content=\"\" />
        <meta name=\"author\" content=\"\" />
        <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" type=\"image/x-icon\" href=\"assets/favicon.ico\" />
        <!-- Font Awesome icons (free version)-->
        <script src=\"https://use.fontawesome.com/releases/v6.1.0/js/all.js\" crossorigin=\"anonymous\"></script>
        <!-- Google fonts-->
        <link href=\"https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href=\"../../public/css/styles.css\" rel=\"stylesheet\" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class=\"navbar navbar-expand-lg navbar-light\" id=\"mainNav\">
            <div class=\"container px-4 px-lg-5\">
                <a class=\"navbar-brand\" href=\"index.html\">Blog PHP</a>
                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    Menu
                    <i class=\"fas fa-bars\"></i>
                </button>
                <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
                    <ul class=\"navbar-nav ms-auto py-4 py-lg-0\">
                        <li class=\"nav-item\"><a class=\"nav-link px-lg-3 py-3 py-lg-4\" href=\"index.html\">Home</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link px-lg-3 py-3 py-lg-4\" href=\"about.html\">All Post</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link px-lg-3 py-3 py-lg-4\" href=\"contact.html\">Contact</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link px-lg-3 py-3 py-lg-4\" href=\"login.html\">login</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link px-lg-3 py-3 py-lg-4\" href=\"register.html\">register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class=\"masthead\" style=\"background-image: url('../../public/img/home-bg.jpg')\">
            <div class=\"container position-relative px-4 px-lg-5\">
                <div class=\"row gx-4 gx-lg-5 justify-content-center\">
                    <div class=\"col-md-10 col-lg-8 col-xl-7\">
                        <div class=\"site-heading\">
                            <h1>developpeur Web</h1>
                            <span class=\"subheading\">A Blog Theme by Start Bootstrap</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        ";
        // line 52
        $this->displayBlock('body', $context, $blocks);
        // line 53
        echo "        <!-- Footer-->
        <footer class=\"border-top\">
            <div class=\"container px-4 px-lg-5\">
                <div class=\"row gx-4 gx-lg-5 justify-content-center\">
                    <div class=\"col-md-10 col-lg-8 col-xl-7\">
                        <ul class=\"list-inline text-center\">
                            <li class=\"list-inline-item\">
                                <a href=\"#!\">
                                    <span class=\"fa-stack fa-lg\">
                                        <i class=\"fas fa-circle fa-stack-2x\"></i>
                                        <i class=\"fab fa-twitter fa-stack-1x fa-inverse\"></i>
                                    </span>
                                </a>
                            </li>
                            <li class=\"list-inline-item\">
                                <a href=\"#!\">
                                    <span class=\"fa-stack fa-lg\">
                                        <i class=\"fas fa-circle fa-stack-2x\"></i>
                                        <i class=\"fab fa-facebook-f fa-stack-1x fa-inverse\"></i>
                                    </span>
                                </a>
                            </li>
                            <li class=\"list-inline-item\">
                                <a href=\"#!\">
                                    <span class=\"fa-stack fa-lg\">
                                        <i class=\"fas fa-circle fa-stack-2x\"></i>
                                        <i class=\"fab fa-github fa-stack-1x fa-inverse\"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class=\"small text-center text-muted fst-italic\">Copyright &copy; Your Website 2022</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js\"></script>
        <!-- Core theme JS-->
        <script src=\"js/scripts.js\"></script>
    </body>
</html>
";
    }

    // line 8
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Clean Blog - Start Bootstrap Theme";
    }

    // line 52
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "default.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  150 => 52,  143 => 8,  97 => 53,  95 => 52,  48 => 8,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default.html.twig", "C:\\wamp64\\www\\Blog-PHP\\views\\default.html.twig");
    }
}
