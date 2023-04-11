using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace cadastro
{
    internal class Cliente
    {
        string Nome { get; set; }
        string Telefone { get; set; }
        string Endereco { get; set; }
        string Escolar { get; set; }
        int Idade { get; set; }
        string Turno { get; set; }


      
        public void cadastrar(string nome, string telefone, string endereco, int idade, string turno)
        {
            nome = Nome;
            telefone = Telefone;
            endereco = Endereco;
            idade = Idade;
            turno = Turno;

            

        }
        public void buscarEscolar()
        {

        }
        public void editarPerfil()
        {

        }
    }
}
