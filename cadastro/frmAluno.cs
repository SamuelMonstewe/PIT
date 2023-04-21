using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace cadastro
{
    public partial class frmAluno : Form
    {
        public frmAluno()
        {
            InitializeComponent();
        }

        Aluno A = new Aluno();
        private void btnCadastar_Click(object sender, EventArgs e)
        {

            A.Nome = txtNome.Text;
            A.Cpf = txtCpf.Text;
            A.Idade = int.Parse(txtIdade.Text);
            A.Endereco = txtEndereco.Text;
            A.InstituicaoDeEnsino = txtEscola.Text;

            string Nome = A.Nome;
            string Cpf = A.Cpf;
            int Idade = A.Idade;
            string Endereco = A.Endereco;
            string Escola = A.InstituicaoDeEnsino;

            MessageBox.Show(A.cadastrarDadosPessoais(Nome, Cpf, Idade) + " " +
            A.cadastrarInformacoesParaBuscaDeEscolares(Escola, Endereco),
            "INFORMAÇÕES", MessageBoxButtons.OK, MessageBoxIcon.Information); 
        }
    }
}
