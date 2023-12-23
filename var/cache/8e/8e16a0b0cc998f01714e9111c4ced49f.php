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

/* Article/index.html.twig */
class __TwigTemplate_aab77d265086abd0f440a509a63708a8 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "Article/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Carte OpenStreetMap";
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <h1>Carte OpenStreetMap</h1>
    <div id=\"map\" style=\"height: 700px;\"></div>

    <link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet@1.7.1/dist/leaflet.css\" />
    <script src=\"https://unpkg.com/leaflet@1.7.1/dist/leaflet.js\"></script>

    <script>
        // Supposons que ";
        // line 13
        echo json_encode(($context["donsDuSang"] ?? null));
        echo " renvoie un tableau d'objets JSON.
        var donsDuSang = ";
        // line 14
        echo json_encode(($context["donsDuSang"] ?? null));
        echo ";

        console.log(donsDuSang);

        // Créez une carte Leaflet et centrez-la sur la France
        var map = L.map('map').setView([46.603354, 1.888334], 6); // Coordonnées du centre de la France et niveau de zoom

        // Ajoutez une couche de tuiles OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Itérer sur le tableau d'objets JSON pour ajouter des marqueurs à la carte
        donsDuSang.forEach(function(don) {
            if (don.latitude && don.longitude) {
                L.marker([don.latitude, don.longitude]).addTo(map);
            }
        });
    </script>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "Article/index.html.twig";
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
        return array (  72 => 14,  68 => 13,  59 => 6,  55 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}{{ parent() }} - Carte OpenStreetMap{% endblock %}

{% block body %}
    <h1>Carte OpenStreetMap</h1>
    <div id=\"map\" style=\"height: 700px;\"></div>

    <link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet@1.7.1/dist/leaflet.css\" />
    <script src=\"https://unpkg.com/leaflet@1.7.1/dist/leaflet.js\"></script>

    <script>
        // Supposons que {{ donsDuSang|json_encode|raw }} renvoie un tableau d'objets JSON.
        var donsDuSang = {{ donsDuSang|json_encode|raw }};

        console.log(donsDuSang);

        // Créez une carte Leaflet et centrez-la sur la France
        var map = L.map('map').setView([46.603354, 1.888334], 6); // Coordonnées du centre de la France et niveau de zoom

        // Ajoutez une couche de tuiles OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Itérer sur le tableau d'objets JSON pour ajouter des marqueurs à la carte
        donsDuSang.forEach(function(don) {
            if (don.latitude && don.longitude) {
                L.marker([don.latitude, don.longitude]).addTo(map);
            }
        });
    </script>
{% endblock %}
", "Article/index.html.twig", "/var/www/html/src/View/Article/index.html.twig");
    }
}
