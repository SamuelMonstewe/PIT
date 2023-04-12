using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace cadastro
{
    internal class Cliente
    {
        private string Nome { get; set; }
        private string Telefone { get; set; }
        private string Endereco { get; set; }
        private string Escolar { get; set; }
        private int Idade { get; set; }
        private string Turno { get; set;}

        public void cadastrar(string nome, string telefone, string endereco, int idade, string turno)
        {
            nome = Nome;
            telefone = Telefone;
            endereco = Endereco;
            idade = Idade;
            turno = Turno;

        }
       
    }
}
