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

/* Admin/Article/list.html.twig */
class __TwigTemplate_fb4aad95c4b05749dde488106feabfe6 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "Admin/Article/list.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Admin articles";
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <h1>Voici tous les articles</h1>
    <table class=\"table\">
        <thead>
        <tr>
            <th scope=\"col\">Id</th>
            <th scope=\"col\">Titre</th>
            <th scope=\"col\">DatePublication</th>
            <th scope=\"col\">Auteur</th>
            <th scope=\"col\">Delete</th>
        </tr>
        </thead>
        <tbody>

        ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["articles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 20
            echo "            <tr>
                <th scope=\"row\"><a href=\"#\">";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "Id", [], "any", false, false, false, 21), "html", null, true);
            echo "</a></th>
                <td>";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "Titre", [], "any", false, false, false, 22), "html", null, true);
            echo "</td>
                <td>";
            // line 23
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "DatePublication", [], "any", false, false, false, 23), "d/m/Y"), "html", null, true);
            echo "
                <td>";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "Auteur", [], "any", false, false, false, 24), "html", null, true);
            echo "</td>
                <td><a href=\"/?controller=AdminArticle&action=delete&param=";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "Id", [], "any", false, false, false, 25), "html", null, true);
            echo "\"><i class=\"bi bi-trash\"></i></a></td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "
        </tbody>
    </table>

";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "Admin/Article/list.html.twig";
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
        return array (  106 => 28,  97 => 25,  93 => 24,  89 => 23,  85 => 22,  81 => 21,  78 => 20,  74 => 19,  59 => 6,  55 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title%}{{ parent() }} - Admin articles{% endblock %}

{% block body %}
    <h1>Voici tous les articles</h1>
    <table class=\"table\">
        <thead>
        <tr>
            <th scope=\"col\">Id</th>
            <th scope=\"col\">Titre</th>
            <th scope=\"col\">DatePublication</th>
            <th scope=\"col\">Auteur</th>
            <th scope=\"col\">Delete</th>
        </tr>
        </thead>
        <tbody>

        {% for article in articles %}
            <tr>
                <th scope=\"row\"><a href=\"#\">{{ article.Id }}</a></th>
                <td>{{ article.Titre }}</td>
                <td>{{ article.DatePublication|date('d/m/Y') }}
                <td>{{ article.Auteur }}</td>
                <td><a href=\"/?controller=AdminArticle&action=delete&param={{ article.Id }}\"><i class=\"bi bi-trash\"></i></a></td>
            </tr>
        {% endfor %}

        </tbody>
    </table>

{% endblock %}", "Admin/Article/list.html.twig", "/var/www/html/src/View/Admin/Article/list.html.twig");
    }
}
