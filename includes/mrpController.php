<?php
  class mrpController
  {
    public function calcularBicicleta($quantidade)
    {
      $materiais = [
        'roda' => 2 * $quantidade,
        'quadro' => 1 * $quantidade,
        'guidao' => 1 * $quantidade,
      ];
      return $materiais;
    }

    public function calcularComputador($quantidade)
    {
      $materiais = [
        'gabinete' => 1 * $quantidade,
        'placa-mae' => 1 * $quantidade,
        'memoria-ram' => 2 * $quantidade,
      ];
      return $materiais;
    }

    public function calcular($data)
    {
      $produto = $data['produto'] ?? null;
      $quantidade = isset($data['quantidade']) ? intval($data['quantidade']) : null;

      if (!$produto || !$quantidade) {
        return json_encode("Produto e quantidade não podem estar vazios!");
      }

      if ($produto == "Bicicleta") {
        $result = $this->calcularBicicleta($quantidade);
      }
      elseif ($produto == "Computador") {
        $result = $this->calcularComputador($quantidade);
      } else {
        return json_encode("Produto não encontrado!");
      }

      return json_encode($result);
    }

  }
