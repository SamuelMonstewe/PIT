using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace cadastro
{
    internal class Aluno
    {
        public string Nome { get;set; }
        public string Cpf { get;set; }
        public int Idade { get;set; }
        public string InstituicaoDeEnsino { get; set; }
        public string Endereco { get; set; }

        public string cadastrarDadosPessoais(string nome, string cpf, int idade)
        {
            nome = Nome;
            cpf = Cpf;
            idade = Idade;

            return $"Dados cadastrados com sucesso!\n {nome}, {cpf}, {idade}";
        }

        public string cadastrarInformacoesParaBuscaDeEscolares(string instituicaoDeEnsino, string endereco)
        {
            instituicaoDeEnsino = InstituicaoDeEnsino;
            endereco = Endereco;

            return $"\n {instituicaoDeEnsino}, {endereco}";

        }

    }
}
