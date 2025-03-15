<?php
/*
Plugin Name: Calculadora de proteinas
Plugin URI: https://raccowebdev.com
Description: Un plugin para calcular cuanta proteina necesitas segun tu peso y actividad.
Version: 1.0
Author: Raccowebdev
License: GPL2
*/

// Evitar acceso directo
if (!defined('ABSPATH')) {
  exit;
}

// Funcion para mostrart el formulario de la calculadora
function protein_calculator_form(){
  ob_start(); ?>
  <div class="container mt-4">
    <div class="card shadow p-4">
      <h3 class="text-center">Calculadora de proteina</h3>
      <form id="protein-form">

          <div class="mb-3">
            <label for="protein-calc-peso" class="form-label">Peso (kg):</label>
            <input type="number" class="form-control" id="protein-calc-peso" name="peso" required aria-labelledby="peso">
          </div>

          <div class="mb-3">
            <label for="protein-calc-actividad" class="form-label">Nivel de actividad:</label>
            <select name="actividad" id="protein-calc-actividad" class="form-select">
              <option value="1.2">Sedentario</option>
              <option value="1.4">Actividad ligera</option>
              <option value="1.6">Moderado</option>
              <option value="1.8">Alto</option>
              <option value="2.0">Atleta</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary w-100">Calcular proteina</button>
        </form>

        <p id="protein-resultado" class="mt-3 text-center fw-bold"></p>
    </div>
  </div>
  <?php
  return ob_get_clean();
}
add_shortcode('protein_calculator', 'protein_calculator_form');

// Enqueue Scripts y Bootstrap
function protein_calculator_enqueue_scripts() {
  wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
  wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
  wp_enqueue_script('protein-calculator-js', plugin_dir_url(__FILE__) . 'protein-calculator.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'protein_calculator_enqueue_scripts');

