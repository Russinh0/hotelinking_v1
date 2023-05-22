import * as React from 'react';
import { styled } from '@mui/material/styles';
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell, { tableCellClasses } from '@mui/material/TableCell';
import TableContainer from '@mui/material/TableContainer';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import Paper from '@mui/material/Paper';
import { Button, colors } from '@mui/material';

const StyledTableCell = styled(TableCell)(({ theme }) => ({
  [`&.${tableCellClasses.head}`]: {
    backgroundColor: theme.palette.common.black,
    color: theme.palette.common.white,
  },
  [`&.${tableCellClasses.body}`]: {
    fontSize: 14,
  },
}));

const StyledTableRow = styled(TableRow)(({ theme }) => ({
  '&:nth-of-type(odd)': {
    backgroundColor: theme.palette.action.hover,
  },
  // hide last border
  '&:last-child td, &:last-child th': {
    border: 0,
  },
}));

function createData(product, promotionalCode, state) {
  return { product, promotionalCode, state};
}

const rows = [
  createData('Frozen yoghurt', 'codigo_promo1', true),
  createData('Ice cream sandwich', 'codigo_promo2', false),
  createData('Eclair', 'codigo_promo3', true),
  createData('Cupcake', 'codigo_promo4', true),
  createData('Gingerbread', 'codigo_promo5', false),
];

export default function PromotionalCode() {
  return (
      <TableContainer sx={{display:'flex',justifyContent:'center',alignItems:'center',height:'90vh',width:'80vw',marginRight:'10vw',marginLeft:'10vw'}}   >
          
      <Table sx={{ minWidth:700 }}component={Paper }>
        <TableHead >
          <TableRow>
            <StyledTableCell>Nombre del Producto</StyledTableCell>
            <StyledTableCell align="right">Codigo promocional</StyledTableCell>
            <StyledTableCell align="right">Estado</StyledTableCell>
          </TableRow>
        </TableHead>
        <TableBody>
          {rows.map((row) => (
            <StyledTableRow key={row.product}>
              <StyledTableCell component="th" scope="row">
                {row.product}
              </StyledTableCell>
              <StyledTableCell align="right">{row.promotionalCode}</StyledTableCell>
              <StyledTableCell align="right">
                {
                    row.state?
                    <Button variant="contained" disabled>{'Canjeado'}</Button>
                    :
                    <Button variant="contained" color="success">{'Canjear'}</Button>
                }
              </StyledTableCell>
            </StyledTableRow>
          ))}
        </TableBody>
      </Table>
    
    </TableContainer>
  );
}
