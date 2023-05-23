async function consultaCEP(e) {
  let cep = e.target.value;
  let retorno;

  if (cep.length == 8) {
    retorno = await fetch(
      `http://cep.republicavirtual.com.br/web_cep.php?cep=${cep}&formato=json`
    );
    let endereco = await retorno.json();

    if (endereco.resultado !== "0") {
      const { bairro, cidade, logradouro, uf } = endereco;

      document.getElementById("inputEndereco").value = logradouro;
      document.getElementById("inputCidade").value = cidade;
      document.getElementById("inputBairro").value = bairro;
      document.getElementById("inputEstado").value = uf;

      const buttonSubmit = document.getElementById("buttonSubmit");
      buttonSubmit.disabled = false;
    } else {
      document.getElementById("inputCep").value = "";
      alert("CEP inválido");
    }
  }
}
