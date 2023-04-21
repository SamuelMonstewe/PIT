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
    public partial class frmMotorista : Form
    {
        public frmMotorista()
        {
            InitializeComponent();
        }

        private void label6_Click(object sender, EventArgs e)
        {

        }

        Motorista M = new Motorista();

        private void btnCadastar_Click(object sender, EventArgs e)
        {
            M.Nome = txtnome.Text;
            M.Cpf = int.Parse(txtcpf.Text);
            M.Rota = txtrota.Text;
            M.TurnoDeTrabalho = txtturno.Text;
            M.Idade = int.Parse(txtidade.Text);

            string nome = M.Nome;
            int cpf = M.Cpf;
            string rota = M.Rota;
            string turno = M.TurnoDeTrabalho;
            int idade = M.Idade;

            MessageBox.Show(M.cadastrar(nome, cpf, idade, rota, turno), "Cadastro Completo!",
                MessageBoxButtons.OKCancel, MessageBoxIcon.Information);
        }
    }
}
