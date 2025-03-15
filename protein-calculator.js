document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("protein-form");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const peso = parseFloat(
      document.getElementById("protein-calc-peso").value.trim()
    );
    const actividad = parseFloat(
      document.getElementById("protein-calc-actividad").value
    );

    if (!peso || isNaN(peso) || peso <= 0) {
      document.getElementById("protein-resultado").innerText =
        "Por favor, ingrese un peso válido.";
      return;
    }

    //Formula: Peso * nivel de actividad
    const proteinaMin = (peso * actividad).toFixed(2);
    const proteinaMax = (peso * actividad * 1.2).toFixed(1);

    document.getElementById(
      "protein-resultado"
    ).innerText = `Necesitas consumir entre ${proteinaMin} y ${proteinaMax} gramos de proteína al día.`;
  });
});
