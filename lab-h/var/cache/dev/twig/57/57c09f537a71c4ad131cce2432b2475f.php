<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* pizza/show.html.twig */
class __TwigTemplate_84c208ad18fd52a6769fbe499bf1f7e7 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pizza/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pizza/show.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Pizza";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "    <div class=\"container py-3\">
        <div class=\"card p-3 shadow-sm bg-white rounded-3\">
            <h1>Pizza</h1>

            <div class=\"table-responsive rounded-3 overflow-hidden\">
                <table class=\"table mb-0\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pizza"]) || array_key_exists("pizza", $context) ? $context["pizza"] : (function () { throw new RuntimeError('Variable "pizza" does not exist.', 15, $this->source); })()), "id", [], "any", false, false, false, 15), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pizza"]) || array_key_exists("pizza", $context) ? $context["pizza"] : (function () { throw new RuntimeError('Variable "pizza" does not exist.', 19, $this->source); })()), "name", [], "any", false, false, false, 19), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Price</th>
                <td><span class=\"badge bg-success rounded-pill\">";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pizza"]) || array_key_exists("pizza", $context) ? $context["pizza"] : (function () { throw new RuntimeError('Variable "pizza" does not exist.', 23, $this->source); })()), "price", [], "any", false, false, false, 23), "html", null, true);
        yield "</span></td>
            </tr>
            <tr>
                <th>Description</th>
                <td>";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pizza"]) || array_key_exists("pizza", $context) ? $context["pizza"] : (function () { throw new RuntimeError('Variable "pizza" does not exist.', 27, $this->source); })()), "description", [], "any", false, false, false, 27), "html", null, true);
        yield "</td>
            </tr>
        </tbody>
            </table>
        </div>

            <div class=\"mt-3\">
                <a href=\"";
        // line 34
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_pizza_index");
        yield "\" class=\"btn btn-secondary btn-sm\">back to list</a>
                <a href=\"";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_pizza_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["pizza"]) || array_key_exists("pizza", $context) ? $context["pizza"] : (function () { throw new RuntimeError('Variable "pizza" does not exist.', 35, $this->source); })()), "id", [], "any", false, false, false, 35)]), "html", null, true);
        yield "\" class=\"btn btn-outline-primary btn-sm ms-2\">edit</a>
                ";
        // line 36
        yield Twig\Extension\CoreExtension::include($this->env, $context, "pizza/_delete_form.html.twig");
        yield "
            </div>
        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pizza/show.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  150 => 36,  146 => 35,  142 => 34,  132 => 27,  125 => 23,  118 => 19,  111 => 15,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \x27base.html.twig\x27 %}

{% block title %}Pizza{% endblock %}

{% block body %}
    <div class=\"container py-3\">
        <div class=\"card p-3 shadow-sm bg-white rounded-3\">
            <h1>Pizza</h1>

            <div class=\"table-responsive rounded-3 overflow-hidden\">
                <table class=\"table mb-0\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ pizza.id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ pizza.name }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td><span class=\"badge bg-success rounded-pill\">{{ pizza.price }}</span></td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ pizza.description }}</td>
            </tr>
        </tbody>
            </table>
        </div>

            <div class=\"mt-3\">
                <a href=\"{{ path(\x27app_pizza_index\x27) }}\" class=\"btn btn-secondary btn-sm\">back to list</a>
                <a href=\"{{ path(\x27app_pizza_edit\x27, {\x27id\x27: pizza.id}) }}\" class=\"btn btn-outline-primary btn-sm ms-2\">edit</a>
                {{ include(\x27pizza/_delete_form.html.twig\x27) }}
            </div>
        </div>
    </div>
{% endblock %}
", "pizza/show.html.twig", "C:\\Users\\nanix\\Desktop\\ZUT\\PTW_REPO\\sj57862.github.io\\lab-h\\templates\\pizza\\show.html.twig");
    }
}
