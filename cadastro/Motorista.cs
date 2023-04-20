using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace cadastro
{
    internal class Motorista
    {
        public string Nome { get; set; }
        public int Cpf { get; set; }
        public int Idade { get; set; }
        public string Rota { get; set; }
        public string TurnoDeTrabalho { get; set; }

        public string cadastrar(string nome, int cpf, int idade, string rota, string turnoDeTrabalho)
        {
             nome = Nome;
             cpf = Cpf;
             idade = Idade;
             rota = Rota;
             turnoDeTrabalho = TurnoDeTrabalho;

            if(nome == "" || cpf == 0 || idade == 0 || rota == "" || turnoDeTrabalho == "") 
                return "Preencha todos os campos!"; 
            else
                return $"Dados cadastrados: {nome}, {idade}, {cpf}, {rota}, {turnoDeTrabalho}";
        }
    }
}
