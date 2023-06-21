/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/GUIForms/JFrame.java to edit this template
 */
package br.com.infox.telas;

/**
 *
 * @author admin
 */
  import java.sql.*;
  import br.com.infox.dal.ModuloConexao;
import javax.swing.JOptionPane;
public class Agendamentos extends javax.swing.JFrame {
    Connection conexao= null;
    PreparedStatement pst= null;
    ResultSet rs=null;

    /**
     * Creates new form Agendamentos
     */
    
    public Agendamentos() {
        initComponents();
         conexao=ModuloConexao.conector();
         
    }
    private void consultar(){
        String sql="select * from agendamentos where id=?";
        try {
            pst=conexao.prepareStatement(sql);
            pst.setString(1,txtAgeId.getText());
            rs=pst.executeQuery();
            if (rs.next()) {
                txtAgeCliente.setText(rs.getString(2));
                txtAgeServico.setText(rs.getString(3));
                txtAgeProfissionais.setText(rs.getString(4));
                txtAgeValor.setText(rs.getString(5));
                txtAgeData.setText(rs.getString(6));
                txtAgeHora.setText(rs.getString(7));
            } else {
                JOptionPane.showMessageDialog(null,"agendamento não cadastrado");
                txtAgeCliente.setText(null);
                txtAgeServico.setText(null);
                txtAgeProfissionais.setText(null);
                txtAgeValor.setText(null);
                txtAgeData.setText(null);
                txtAgeHora.setText(null);
            }
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, e);
        }
         
        
    }
    private void adicionar(){
        String sql="insert into agendamentos(id,cliente,servico,profissional,valor,data,hora)values(?,?,?,?,?,?,?)";
        try {
            pst=conexao.prepareStatement(sql);
            pst.setString(1,txtAgeId.getText());
            pst.setString(2,txtAgeCliente.getText());
            pst.setString(3,txtAgeServico.getText());
            pst.setString(4,txtAgeProfissionais.getText());
            pst.setString(5,txtAgeValor.getText());
            pst.setString(6,txtAgeData.getText());
            pst.setString(7,txtAgeHora.getText());
            
            if (txtAgeId.getText().isEmpty()||(txtAgeCliente.getText().isEmpty()||(txtAgeServico.getText().isEmpty()||(txtAgeProfissionais.getText().isEmpty()||(txtAgeValor.getText().isEmpty()||(txtAgeData.getText().isEmpty()||(txtAgeHora.getText().isEmpty()))))))) {
                JOptionPane.showMessageDialog(null,"Preencha todos os campos de obrigação");
                
            } else {
           
            
            
            int adicionado=pst.executeUpdate();
           // System.out.println(adicionado);
            if(adicionado>0){
               JOptionPane.showMessageDialog(null,"Agendamento adicionado com sucesso");
               txtAgeId.setText(null);
               txtAgeCliente.setText(null);
                txtAgeServico.setText(null);
                txtAgeProfissionais.setText(null);
                txtAgeValor.setText(null);
                txtAgeData.setText(null);
                txtAgeHora.setText(null);
            }
            }
        } catch (Exception e) {
        }
       
    }
    private void alterar(){
        String sql="update agendamentos set cliente=?,servico=?,profissional=?,valor=?,data=?,hora=? where id=?";
        try {
            pst=conexao.prepareStatement(sql);
            pst.setString(1,txtAgeCliente.getText());
            pst.setString(2,txtAgeServico.getText());
            pst.setString(3,txtAgeProfissionais.getText());
            pst.setString(4,txtAgeValor.getText());
            pst.setString(5,txtAgeData.getText());
            pst.setString(6,txtAgeHora.getText());
             pst.setString(7,txtAgeId.getText());
              if (txtAgeId.getText().isEmpty()||(txtAgeCliente.getText().isEmpty()||(txtAgeServico.getText().isEmpty()||(txtAgeProfissionais.getText().isEmpty()||(txtAgeValor.getText().isEmpty()||(txtAgeData.getText().isEmpty()||(txtAgeHora.getText().isEmpty()))))))) {
                JOptionPane.showMessageDialog(null,"Preencha todos os campos de obrigação");
                
            } else {
           
            
            
            int adicionado=pst.executeUpdate();
           // System.out.println(adicionado);
            if(adicionado>0){
               JOptionPane.showMessageDialog(null,"Dados do Agendamento adicionado com sucesso");
               txtAgeId.setText(null);
               txtAgeCliente.setText(null);
                txtAgeServico.setText(null);
                txtAgeProfissionais.setText(null);
                txtAgeValor.setText(null);
                txtAgeData.setText(null);
                txtAgeHora.setText(null);
            }
            }
        } catch (Exception e) {
             JOptionPane.showMessageDialog(null, e);
        }
    }
    
    private void remover(){
        int confirma=JOptionPane.showConfirmDialog(null,"tem certeza de que deseja remover o agendamento?","Atenção",JOptionPane.YES_NO_OPTION);
        if(confirma==JOptionPane.YES_OPTION){
            String sql="delete from agendamentos where id=?";
            try {
                pst=conexao.prepareStatement(sql);
                pst.setString(1, txtAgeId.getText());
               int apagado= pst.executeUpdate();
               if(apagado>0){
                   JOptionPane.showMessageDialog(null, "Agendamento removido com sucesso");
                   txtAgeId.setText(null);
               txtAgeCliente.setText(null);
                txtAgeServico.setText(null);
                txtAgeProfissionais.setText(null);
                txtAgeValor.setText(null);
                txtAgeData.setText(null);
                txtAgeHora.setText(null);
               }
            } catch (Exception e) {
            }
            
        }
    }
    
    
    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jLabel10 = new javax.swing.JLabel();
        btnAgeDelete = new javax.swing.JButton();
        btnAgeUpdate = new javax.swing.JButton();
        btnAgeRead = new javax.swing.JButton();
        btnAgeCreate = new javax.swing.JButton();
        jLabel9 = new javax.swing.JLabel();
        jLabel8 = new javax.swing.JLabel();
        jLabel6 = new javax.swing.JLabel();
        jLabel7 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        txtAgeHora = new javax.swing.JTextField();
        txtAgeData = new javax.swing.JTextField();
        txtAgeValor = new javax.swing.JTextField();
        txtAgeProfissionais = new javax.swing.JTextField();
        txtAgeServico = new javax.swing.JTextField();
        txtAgeCliente = new javax.swing.JTextField();
        txtAgeId = new javax.swing.JTextField();
        LabelAgenda = new javax.swing.JLabel();
        jLabel11 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        jLabel1 = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        getContentPane().setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        jLabel10.setFont(new java.awt.Font("Segoe UI Black", 0, 18)); // NOI18N
        jLabel10.setForeground(new java.awt.Color(255, 255, 255));
        jLabel10.setText("*Campos de obrigacão");
        getContentPane().add(jLabel10, new org.netbeans.lib.awtextra.AbsoluteConstraints(890, 140, -1, -1));

        btnAgeDelete.setIcon(new javax.swing.ImageIcon("C:\\Users\\User\\Downloads\\delete_remove_user_16733.png")); // NOI18N
        btnAgeDelete.setToolTipText("Excluir");
        btnAgeDelete.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        btnAgeDelete.setPreferredSize(new java.awt.Dimension(80, 80));
        btnAgeDelete.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnAgeDeleteActionPerformed(evt);
            }
        });
        getContentPane().add(btnAgeDelete, new org.netbeans.lib.awtextra.AbsoluteConstraints(420, 700, 90, 90));

        btnAgeUpdate.setIcon(new javax.swing.ImageIcon("C:\\Users\\User\\Downloads\\configure_user_16726.png")); // NOI18N
        btnAgeUpdate.setToolTipText("Editar");
        btnAgeUpdate.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        btnAgeUpdate.setPreferredSize(new java.awt.Dimension(80, 80));
        btnAgeUpdate.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnAgeUpdateActionPerformed(evt);
            }
        });
        getContentPane().add(btnAgeUpdate, new org.netbeans.lib.awtextra.AbsoluteConstraints(310, 700, 80, 90));

        btnAgeRead.setIcon(new javax.swing.ImageIcon("C:\\Users\\User\\Downloads\\search_find_user_16727.png")); // NOI18N
        btnAgeRead.setToolTipText("Pesquisar");
        btnAgeRead.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        btnAgeRead.setPreferredSize(new java.awt.Dimension(80, 80));
        btnAgeRead.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnAgeReadActionPerformed(evt);
            }
        });
        getContentPane().add(btnAgeRead, new org.netbeans.lib.awtextra.AbsoluteConstraints(210, 700, 80, 90));

        btnAgeCreate.setIcon(new javax.swing.ImageIcon("C:\\Users\\User\\Downloads\\new_add_user_16734.png")); // NOI18N
        btnAgeCreate.setToolTipText("Adicionar");
        btnAgeCreate.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        btnAgeCreate.setPreferredSize(new java.awt.Dimension(80, 80));
        btnAgeCreate.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnAgeCreateActionPerformed(evt);
            }
        });
        getContentPane().add(btnAgeCreate, new org.netbeans.lib.awtextra.AbsoluteConstraints(100, 700, -1, 90));

        jLabel9.setFont(new java.awt.Font("Segoe UI Black", 0, 18)); // NOI18N
        jLabel9.setForeground(new java.awt.Color(255, 255, 255));
        jLabel9.setText("*Hora");
        getContentPane().add(jLabel9, new org.netbeans.lib.awtextra.AbsoluteConstraints(90, 570, -1, 30));

        jLabel8.setFont(new java.awt.Font("Segoe UI Black", 0, 18)); // NOI18N
        jLabel8.setForeground(new java.awt.Color(255, 255, 255));
        jLabel8.setText("*Data");
        getContentPane().add(jLabel8, new org.netbeans.lib.awtextra.AbsoluteConstraints(90, 510, -1, 30));

        jLabel6.setFont(new java.awt.Font("Segoe UI Black", 0, 18)); // NOI18N
        jLabel6.setForeground(new java.awt.Color(255, 255, 255));
        jLabel6.setText("*Valor");
        getContentPane().add(jLabel6, new org.netbeans.lib.awtextra.AbsoluteConstraints(100, 440, -1, 20));

        jLabel7.setFont(new java.awt.Font("Segoe UI Black", 0, 18)); // NOI18N
        jLabel7.setForeground(new java.awt.Color(255, 255, 255));
        jLabel7.setText("*Servico");
        getContentPane().add(jLabel7, new org.netbeans.lib.awtextra.AbsoluteConstraints(80, 300, -1, 20));

        jLabel5.setFont(new java.awt.Font("Segoe UI Black", 0, 18)); // NOI18N
        jLabel5.setForeground(new java.awt.Color(255, 255, 255));
        jLabel5.setText("*Profissionais");
        getContentPane().add(jLabel5, new org.netbeans.lib.awtextra.AbsoluteConstraints(60, 370, -1, 20));

        jLabel4.setFont(new java.awt.Font("Segoe UI Black", 0, 18)); // NOI18N
        jLabel4.setForeground(new java.awt.Color(255, 255, 255));
        jLabel4.setText("*Id");
        getContentPane().add(jLabel4, new org.netbeans.lib.awtextra.AbsoluteConstraints(110, 160, -1, 20));

        txtAgeHora.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtAgeHoraActionPerformed(evt);
            }
        });
        getContentPane().add(txtAgeHora, new org.netbeans.lib.awtextra.AbsoluteConstraints(200, 570, 360, 40));

        txtAgeData.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtAgeDataActionPerformed(evt);
            }
        });
        getContentPane().add(txtAgeData, new org.netbeans.lib.awtextra.AbsoluteConstraints(200, 500, 360, 40));

        txtAgeValor.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtAgeValorActionPerformed(evt);
            }
        });
        getContentPane().add(txtAgeValor, new org.netbeans.lib.awtextra.AbsoluteConstraints(200, 430, 360, 40));

        txtAgeProfissionais.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtAgeProfissionaisActionPerformed(evt);
            }
        });
        getContentPane().add(txtAgeProfissionais, new org.netbeans.lib.awtextra.AbsoluteConstraints(200, 360, 360, 40));

        txtAgeServico.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtAgeServicoActionPerformed(evt);
            }
        });
        getContentPane().add(txtAgeServico, new org.netbeans.lib.awtextra.AbsoluteConstraints(200, 290, 360, 40));

        txtAgeCliente.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtAgeClienteActionPerformed(evt);
            }
        });
        getContentPane().add(txtAgeCliente, new org.netbeans.lib.awtextra.AbsoluteConstraints(200, 220, 360, 40));

        txtAgeId.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtAgeIdActionPerformed(evt);
            }
        });
        getContentPane().add(txtAgeId, new org.netbeans.lib.awtextra.AbsoluteConstraints(200, 150, 360, 40));

        LabelAgenda.setFont(new java.awt.Font("Liberation Sans", 1, 36)); // NOI18N
        LabelAgenda.setForeground(new java.awt.Color(255, 255, 255));
        LabelAgenda.setText("Agenda");
        getContentPane().add(LabelAgenda, new org.netbeans.lib.awtextra.AbsoluteConstraints(580, 50, 150, 60));

        jLabel11.setFont(new java.awt.Font("Segoe UI Black", 0, 18)); // NOI18N
        jLabel11.setForeground(new java.awt.Color(255, 255, 255));
        jLabel11.setText("*Cliente");
        getContentPane().add(jLabel11, new org.netbeans.lib.awtextra.AbsoluteConstraints(80, 230, -1, -1));

        jLabel2.setIcon(new javax.swing.ImageIcon("C:\\Users\\User\\Desktop\\imagens\\Agenda-PainelFundo.png")); // NOI18N
        getContentPane().add(jLabel2, new org.netbeans.lib.awtextra.AbsoluteConstraints(10, -60, -1, -1));

        jLabel1.setIcon(new javax.swing.ImageIcon("C:\\Users\\User\\Desktop\\imagens\\AgendaFundo.png")); // NOI18N
        getContentPane().add(jLabel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(43, 0, -1, -1));

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void txtAgeIdActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtAgeIdActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txtAgeIdActionPerformed

    private void txtAgeClienteActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtAgeClienteActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txtAgeClienteActionPerformed

    private void txtAgeServicoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtAgeServicoActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txtAgeServicoActionPerformed

    private void txtAgeProfissionaisActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtAgeProfissionaisActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txtAgeProfissionaisActionPerformed

    private void txtAgeValorActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtAgeValorActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txtAgeValorActionPerformed

    private void txtAgeDataActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtAgeDataActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txtAgeDataActionPerformed

    private void txtAgeHoraActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtAgeHoraActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txtAgeHoraActionPerformed

    private void btnAgeCreateActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnAgeCreateActionPerformed
        adicionar();
    }//GEN-LAST:event_btnAgeCreateActionPerformed

    private void btnAgeReadActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnAgeReadActionPerformed
        consultar();
    }//GEN-LAST:event_btnAgeReadActionPerformed

    private void btnAgeUpdateActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnAgeUpdateActionPerformed
        alterar();
    }//GEN-LAST:event_btnAgeUpdateActionPerformed

    private void btnAgeDeleteActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnAgeDeleteActionPerformed
       remover();
    }//GEN-LAST:event_btnAgeDeleteActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Agendamentos.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Agendamentos.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Agendamentos.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Agendamentos.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Agendamentos().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JLabel LabelAgenda;
    private javax.swing.JButton btnAgeCreate;
    private javax.swing.JButton btnAgeDelete;
    private javax.swing.JButton btnAgeRead;
    private javax.swing.JButton btnAgeUpdate;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel10;
    private javax.swing.JLabel jLabel11;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    private javax.swing.JLabel jLabel9;
    private javax.swing.JTextField txtAgeCliente;
    private javax.swing.JTextField txtAgeData;
    private javax.swing.JTextField txtAgeHora;
    private javax.swing.JTextField txtAgeId;
    private javax.swing.JTextField txtAgeProfissionais;
    private javax.swing.JTextField txtAgeServico;
    private javax.swing.JTextField txtAgeValor;
    // End of variables declaration//GEN-END:variables
}
