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

/* pizza/_form.html.twig */
class __TwigTemplate_b712cf70c1d236a35209a8423e239fb2 extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pizza/_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pizza/_form.html.twig"));

        // line 1
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 1, $this->source); })()), 'form_start');
        yield "
    <div class=\"row g-3\">
        <div class=\"col-12\">
            ";
        // line 4
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 4, $this->source); })()), "name", [], "any", false, false, false, 4), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
            ";
        // line 5
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 5, $this->source); })()), "name", [], "any", false, false, false, 5), 'widget', ["attr" => ["class" => ("form-control" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 5, $this->source); })()), "name", [], "any", false, false, false, 5), "vars", [], "any", false, false, false, 5), "errors", [], "any", false, false, false, 5))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : (""))), "autofocus" => "autofocus", "placeholder" => "np. Margherita", "maxlength" => "255"]]);
        yield "
            ";
        // line 6
        if ((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })()), "name", [], "any", false, false, false, 6), "vars", [], "any", false, false, false, 6), "errors", [], "any", false, false, false, 6))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 7
            yield "                <div class=\"invalid-feedback\">
                    ";
            // line 8
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 8, $this->source); })()), "name", [], "any", false, false, false, 8), 'errors');
            yield "
                </div>
            ";
        }
        // line 11
        yield "        </div>

        <div class=\"col-md-4 col-12\">
            ";
        // line 14
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 14, $this->source); })()), "price", [], "any", false, false, false, 14), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
            <div class=\"input-group\">
                ";
        // line 16
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 16, $this->source); })()), "price", [], "any", false, false, false, 16), 'widget', ["attr" => ["class" => ("form-control" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 16, $this->source); })()), "price", [], "any", false, false, false, 16), "vars", [], "any", false, false, false, 16), "errors", [], "any", false, false, false, 16))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : (""))), "type" => "number", "step" => "0.01", "min" => "0", "placeholder" => "0.00", "aria-label" => "Price"]]);
        yield "
                <span class=\"input-group-text\">zł</span>
            </div>
            ";
        // line 19
        if ((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 19, $this->source); })()), "price", [], "any", false, false, false, 19), "vars", [], "any", false, false, false, 19), "errors", [], "any", false, false, false, 19))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 20
            yield "                <div class=\"invalid-feedback\">
                    ";
            // line 21
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), "price", [], "any", false, false, false, 21), 'errors');
            yield "
                </div>
            ";
        }
        // line 24
        yield "        </div>

        <div class=\"col-12\">
            ";
        // line 27
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 27, $this->source); })()), "description", [], "any", false, false, false, 27), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
            ";
        // line 28
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 28, $this->source); })()), "description", [], "any", false, false, false, 28), 'widget', ["attr" => ["class" => ("form-control" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 28, $this->source); })()), "description", [], "any", false, false, false, 28), "vars", [], "any", false, false, false, 28), "errors", [], "any", false, false, false, 28))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : (""))), "rows" => 3, "placeholder" => "Krótki opis składników", "maxlength" => "1000"]]);
        yield "
            ";
        // line 29
        if ((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "description", [], "any", false, false, false, 29), "vars", [], "any", false, false, false, 29), "errors", [], "any", false, false, false, 29))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 30
            yield "                <div class=\"invalid-feedback\">
                    ";
            // line 31
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 31, $this->source); })()), "description", [], "any", false, false, false, 31), 'errors');
            yield "
                </div>
            ";
        }
        // line 34
        yield "        </div>
    </div>

    <div class=\"mt-3\">
        <button class=\"btn btn-primary\">";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("button_label", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 38, $this->source); })()), "Save")) : ("Save")), "html", null, true);
        yield "</button>
    </div>

";
        // line 41
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 41, $this->source); })()), 'form_end');
        yield "
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pizza/_form.html.twig";
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
        return array (  136 => 41,  130 => 38,  124 => 34,  118 => 31,  115 => 30,  113 => 29,  109 => 28,  105 => 27,  100 => 24,  94 => 21,  91 => 20,  89 => 19,  83 => 16,  78 => 14,  73 => 11,  67 => 8,  64 => 7,  62 => 6,  58 => 5,  54 => 4,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ form_start(form) }}
    <div class=\"row g-3\">
        <div class=\"col-12\">
            {{ form_label(form.name, null, {\x27label_attr\x27: {\x27class\x27: \x27form-label\x27}}) }}
            {{ form_widget(form.name, {attr: {class: \x27form-control\x27 ~ (form.name.vars.errors|length ? \x27 is-invalid\x27 : \x27\x27), autofocus: \x27autofocus\x27, placeholder: \x27np. Margherita\x27, maxlength: \x27255\x27}}) }}
            {% if form.name.vars.errors|length %}
                <div class=\"invalid-feedback\">
                    {{ form_errors(form.name) }}
                </div>
            {% endif %}
        </div>

        <div class=\"col-md-4 col-12\">
            {{ form_label(form.price, null, {\x27label_attr\x27: {\x27class\x27: \x27form-label\x27}}) }}
            <div class=\"input-group\">
                {{ form_widget(form.price, {attr: {class: \x27form-control\x27 ~ (form.price.vars.errors|length ? \x27 is-invalid\x27 : \x27\x27), type: \x27number\x27, step: \x270.01\x27, min: \x270\x27, placeholder: \x270.00\x27, \x27aria-label\x27: \x27Price\x27}}) }}
                <span class=\"input-group-text\">zł</span>
            </div>
            {% if form.price.vars.errors|length %}
                <div class=\"invalid-feedback\">
                    {{ form_errors(form.price) }}
                </div>
            {% endif %}
        </div>

        <div class=\"col-12\">
            {{ form_label(form.description, null, {\x27label_attr\x27: {\x27class\x27: \x27form-label\x27}}) }}
            {{ form_widget(form.description, {attr: {class: \x27form-control\x27 ~ (form.description.vars.errors|length ? \x27 is-invalid\x27 : \x27\x27), rows: 3, placeholder: \x27Krótki opis składników\x27, maxlength: \x271000\x27}}) }}
            {% if form.description.vars.errors|length %}
                <div class=\"invalid-feedback\">
                    {{ form_errors(form.description) }}
                </div>
            {% endif %}
        </div>
    </div>

    <div class=\"mt-3\">
        <button class=\"btn btn-primary\">{{ button_label|default(\x27Save\x27) }}</button>
    </div>

{{ form_end(form) }}
", "pizza/_form.html.twig", "C:\\Users\\nanix\\Desktop\\ZUT\\PTW_REPO\\sj57862.github.io\\lab-h\\templates\\pizza\\_form.html.twig");
    }
}
