using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace cadastro
{
    internal class Responsavel
    {
        private string Nome { get; set; }
        private string Cpf { get; set; }
        private int Idade { get; set; }
        private string Telefone { get; set; }

        public string cadastrar(string nome, string telefone, string cpf, int idade)
        {
            nome = Nome;
            telefone = Telefone;
            idade = Idade;
            cpf = Cpf;

            return $"Dados cadastrados{nome}, {idade}, {cpf}, {telefone}";

        }
       
    }
}
