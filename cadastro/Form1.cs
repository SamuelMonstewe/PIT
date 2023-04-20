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
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        Responsavel R = new Responsavel();
        private void btnCadastrar_Click(object sender, EventArgs e)
        {
            R.Nome = txtNome.Text;
            R.Cpf = int.Parse(txtCpf.Text);
            R.Idade = int.Parse(txtIdade.Text);
            R.Telefone = txtTelefone.Text;

            string Nome = R.Nome;
            int Cpf = R.Cpf;
            int Idade = R.Idade;
            string Telefone = R.Telefone;

            MessageBox.Show(R.cadastrar(Nome, Telefone, Cpf, Idade), "INFORMAÇÕES", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }
    }
}
