$empenhos = $this->entity->getEmp();
foreach($empenhos as $empenho){
    $validos = ['contrato', 'ata_registro', 'licitacao', 'licitacao_simplificada'];
    if(in_array($empenho->tipo, $validos)){
        if($empenho->tipo == 'contrato'){
            $contrato = $this->getContrato($empenho->execucao_contrato_id);
            if($contrato->tipo == 'ata'){
                $ata_forn = $this->getATa($contrato->ata_registro_geracao_fornecedor_id);
                $ata = $this->getATa($ata_forn->ata_registro_geracao_id);
                $processo = $this->getAtuacao($ata->preparacao_atuacao_id);
            }else if ($contrato->tipo == 'processo_completo'){
                $homologacao = $this->getHomo($contrato->edital_homologacao_id);
                $processo = $this->getAtuacao($homologacao->preparacao_atuacao_id);
            }else if($contrato->tipo == 'licitacao_simplificada'){
                $fornecedor = $this->getFornecedorSimples($contrato->licitacao_simplificada_fornecedor_id)
                $processo = $this->getProcessoSimples($fornecedor->licitacao_simplificada_id);
            }
        }else if($empenho->tipo == 'ata_registro'){
            $ata_forn = $this->getATa($empenho->ata_registro_geracao_fornecedor_id);
            $ata = $this->getATa($ata_forn->ata_registro_geracao_id);
            $processo = $this->getAtuacao($ata->preparacao_atuacao_id);
        }else if($empenho->tipo == 'ata_registro'){
            $processo = $this->getAtuacao($empenho->preparacao_atuacao_id);
        }else if($empenho->tipo == 'licitacao_simplificada'){
            $fornecedor = $this->getFornecedorSimples($empenho->licitacao_simplificada_fornecedor_id)
            $processo = $this->getProcessoSimples($fornecedor->licitacao_simplificada_id);
        }

        if($processo = $processo_id)
    }
}
