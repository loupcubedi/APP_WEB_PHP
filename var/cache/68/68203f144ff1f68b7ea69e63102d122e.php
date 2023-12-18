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

/* Admin/Article/update.html.twig */
class __TwigTemplate_72680eb535f1a4edb5ae0ab6815f4a30 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html.twig", "Admin/Article/update.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "ADMIN - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Update d'un Article ";
    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <h1>Update Article</h1>

    <form method=\"post\" enctype=\"multipart/form-data\">

        <div class=\"mb-3\">
            <input type=\"text\" class=\"form-control\" placeholder=\"Saisir un titre\" name=\"Titre\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "Titre", [], "any", false, false, false, 10), "html", null, true);
        echo "\">
        </div>

        <div class=\"mb-3\">
            <textarea class=\"form-control\" name=\"Description\" rows=\"3\">";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "Description", [], "any", false, false, false, 14), "html", null, true);
        echo "</textarea>
        </div>

        <div class=\"mb-3\">
            <input type=\"date\" class=\"form-control\" name=\"DatePublication\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "DatePublication", [], "any", false, false, false, 18), "Y-m-d"), "html", null, true);
        echo "\">
        </div>

        <div class=\"mb-3\">
            <select class=\"form-select\" name=\"Auteur\">
                <option value=\"Enzo\" ";
        // line 23
        if ((twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "Auteur", [], "any", false, false, false, 23) == "Enzo")) {
            echo "selected";
        }
        echo ">Enzo</option>
                <option value=\"Lukas\" ";
        // line 24
        if ((twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "Auteur", [], "any", false, false, false, 24) == "Lukas")) {
            echo "selected";
        }
        echo ">Lukas</option>
                <option value=\"Rémi\" ";
        // line 25
        if ((twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "Auteur", [], "any", false, false, false, 25) == "Rémi")) {
            echo "selected";
        }
        echo ">Rémi</option>
                <option value=\"Bastien\" ";
        // line 26
        if ((twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "Auteur", [], "any", false, false, false, 26) == "Bastien")) {
            echo "selected";
        }
        echo ">Bastien</option>
                <option value=\"Loup\" ";
        // line 27
        if ((twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "Auteur", [], "any", false, false, false, 27) == "Loup")) {
            echo "selected";
        }
        echo ">Loup</option>
                <option value=\"Kylian\" ";
        // line 28
        if ((twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "Auteur", [], "any", false, false, false, 28) == "Kylian")) {
            echo "selected";
        }
        echo ">Kylian</option>
            </select>
        </div>

        <div class=\"mb-3\">
            <input type=\"file\" class=\"custom-file-input\" name=\"Image\">
        </div>

        ";
        // line 36
        if (($this->env->getFunction('file_exist')->getCallable()(((("./uploads/images/" . twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "ImageRepository", [], "any", false, false, false, 36)) . "/") . twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "ImageFileName", [], "any", false, false, false, 36))) && (twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "ImageFileName", [], "any", false, false, false, 36) != ""))) {
            // line 37
            echo "            <p>Image Actuelle :</p>
            <p>
                <img src=\"/uploads/images/";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "ImageRepository", [], "any", false, false, false, 39), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "ImageFileName", [], "any", false, false, false, 39), "html", null, true);
            echo "\" class=\"img-thumbnail\"/>
            </p>
            <input type=\"hidden\" name=\"ImageRepository\" value=\"";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "ImageRepository", [], "any", false, false, false, 41), "html", null, true);
            echo "\">
            <input type=\"hidden\" name=\"ImageFileName\" value=\"";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "ImageFileName", [], "any", false, false, false, 42), "html", null, true);
            echo "\">
        ";
        }
        // line 44
        echo "



        <button type=\"submit\" class=\"btn btn-primary\">Valider</button>
    </form>


";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "Admin/Article/update.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  154 => 44,  149 => 42,  145 => 41,  138 => 39,  134 => 37,  132 => 36,  119 => 28,  113 => 27,  107 => 26,  101 => 25,  95 => 24,  89 => 23,  81 => 18,  74 => 14,  67 => 10,  60 => 5,  56 => 4,  47 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}
{% block title %}ADMIN - {{ parent() }} - Update d'un Article {% endblock %}

{% block body %}
    <h1>Update Article</h1>

    <form method=\"post\" enctype=\"multipart/form-data\">

        <div class=\"mb-3\">
            <input type=\"text\" class=\"form-control\" placeholder=\"Saisir un titre\" name=\"Titre\" value=\"{{ article.Titre }}\">
        </div>

        <div class=\"mb-3\">
            <textarea class=\"form-control\" name=\"Description\" rows=\"3\">{{ article.Description }}</textarea>
        </div>

        <div class=\"mb-3\">
            <input type=\"date\" class=\"form-control\" name=\"DatePublication\" value=\"{{ article.DatePublication|date(\"Y-m-d\") }}\">
        </div>

        <div class=\"mb-3\">
            <select class=\"form-select\" name=\"Auteur\">
                <option value=\"Enzo\" {% if(article.Auteur ==\"Enzo\")%}selected{% endif %}>Enzo</option>
                <option value=\"Lukas\" {% if(article.Auteur ==\"Lukas\")%}selected{% endif %}>Lukas</option>
                <option value=\"Rémi\" {% if(article.Auteur ==\"Rémi\")%}selected{% endif %}>Rémi</option>
                <option value=\"Bastien\" {% if(article.Auteur ==\"Bastien\")%}selected{% endif %}>Bastien</option>
                <option value=\"Loup\" {% if(article.Auteur ==\"Loup\")%}selected{% endif %}>Loup</option>
                <option value=\"Kylian\" {% if(article.Auteur ==\"Kylian\")%}selected{% endif %}>Kylian</option>
            </select>
        </div>

        <div class=\"mb-3\">
            <input type=\"file\" class=\"custom-file-input\" name=\"Image\">
        </div>

        {% if file_exist( './uploads/images/'~article.ImageRepository~'/'~article.ImageFileName ) and article.ImageFileName !=\"\" %}
            <p>Image Actuelle :</p>
            <p>
                <img src=\"/uploads/images/{{ article.ImageRepository }}/{{ article.ImageFileName }}\" class=\"img-thumbnail\"/>
            </p>
            <input type=\"hidden\" name=\"ImageRepository\" value=\"{{ article.ImageRepository }}\">
            <input type=\"hidden\" name=\"ImageFileName\" value=\"{{ article.ImageFileName }}\">
        {% endif %}




        <button type=\"submit\" class=\"btn btn-primary\">Valider</button>
    </form>


{% endblock %}
", "Admin/Article/update.html.twig", "/var/www/html/src/View/Admin/Article/update.html.twig");
    }
}
