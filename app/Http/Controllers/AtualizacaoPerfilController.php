<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerfilEstudante;
use App\Models\PersonalidadeAluno;
use App\Models\Comunicacao;
use App\Models\Preferencia;
use App\Models\PerfilFamilia;

class AtualizacaoPerfilController extends Controller
{
    public function AtualizaPerfil(Request $request, $id)
    {
        // Exemplo de como salvar dados em diferentes tabelas
        // Certifique-se de que os campos correspondem aos nomes dos campos no seu formulário

        // PerfilEstudante
        $perfilEstudante = PerfilEstudante::find($id);
        if (!$perfilEstudante) {
            $perfilEstudante = new PerfilEstudante();
        }

        $perfilEstudante->diag_laudo = $request->diag_laudo;
        $perfilEstudante->cid = $request->cid;
        $perfilEstudante->nome_medico = $request->nome_medico;
        $perfilEstudante->data_laudo = $request->data_laudo;
        $perfilEstudante->nivel_suporte = $request->nivel_suporte;
        $perfilEstudante->uso_medicamento = $request->uso_medicamento;
        $perfilEstudante->quais_medicamento = $request->quais_medicamento;
        $perfilEstudante->nec_prof_apoio = $request->nec_pro_apoio;
        $perfilEstudante->loc_01 = $request->loc_01;
        $perfilEstudante->hig_02 =$request->hig_02;
        $perfilEstudante->ali_03 =$request->ali_03;
        $perfilEstudante->com_04 =$request->com_04;
        $perfilEstudante->out_05 =$request->out_05;
        $perfilEstudante->out_moments =$request->out_moments;
        $perfilEstudante->at_especializado =$request->at_especializado;
        $perfilEstudante->nome_prof_AEE =$request->nome_prof_AEE;
        $perfilEstudante->save();

        // PersonalidadeAluno
        $personalidadeAluno = PersonalidadeAluno::find($id);
        if (!$personalidadeAluno) {
            $personalidadeAluno = new PersonalidadeAluno();
        }
        $personalidadeAluno->carac_principal = $request->caracteristicas;
        $personalidadeAluno->inter_princ_carac = $request->areas_interesse;
        $personalidadeAluno->livre_gosta_fazer = $request->atividades_livre;
        $personalidadeAluno->feliz_est = $request->feliz;
        $personalidadeAluno->trist_est = $request->triste;
        $personalidadeAluno->obj_apego = $request->objeto_apego;

        $personalidadeAluno->save();

        // Comunicação
        $comunicacao = Comunicacao::find($id);
        if (!$comunicacao) {
            $comunicacao = new Comunicacao();
        }

        $comunicacao->precisa_comunicacao = $request->precisa_comunicacao;
        $comunicacao->entende_instrucao = $request->entende_instrucao;
        $comunicacao->recomenda_instrucao = $request->recomenda_instrucao;

        $comunicacao->save();

        // Preferencia
        $preferencia = Preferencia::find($id);
        if (!$preferencia) {
            $preferencia = new Preferencia();
        }

        // Exemplo de campos para Preferencia
            $preferencia->auditivo_04 = $request->s_auditiva;
            $preferencia-> visual_04= $request->s_visual;
            $preferencia->tatil_04 = $request->s_tatil;
            $preferencia->outros_04 = $request->s_outros;
            $preferencia->maneja_04 = $request->manejo_sensibilidade;
            $preferencia->asa_04 = $request->seletividade_alimentar;
            $preferencia->alimentos_pref_04 = $request->alimentos_preferidos;
            $preferencia->alimento_evita_04 = $request->alimentos_evita;
            $preferencia->contato_pc_04 = $request->afinidade_escola;
            $preferencia->reage_contato = $request->reacao_contato;
            $preferencia->interacao_escola_04 = $request->interacao_escola;
            $preferencia->interesse_atividade_04 = $request->interesse_atividade;
            $preferencia->aprende_visual_04 = $request->r_visual;
            $preferencia->recurso_auditivo_04 = $request->r_auditivo;
            $preferencia->material_concreto_04= $request->m_concreto;
            $preferencia->outro_identificar_04= $request->o_outro;
            $preferencia->descricao_outro_identificar_04= $request->outro_identificar;
            $preferencia->realiza_tarefa_04 = $request->atividades_grupo;
            $preferencia->mostram_eficazes_04= $request->estrategias_eficazes;
            $preferencia->prefere_ts_04= $request->interesse_tarefa;
            
       

        $preferencia->save();

        // PerfilFamilia
        $perfilFamilia = PerfilFamilia::find($id);
        if (!$perfilFamilia) {
            $perfilFamilia = new PerfilFamilia();
        }

        $perfilFamilia->expectativa_05 = $request->expectativas_familia;
        $perfilFamilia->estrategia_05 = $request->estrategias_familia;
        $perfilFamilia->crise_esta_05= $request->crise_estresse;

        $perfilFamilia->save();

        return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
    }
}
