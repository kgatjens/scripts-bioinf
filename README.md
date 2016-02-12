# scripts-bioinf

##GFF format files Parser with PHP.

Basic php script to parse a General Feature Format file. The result is something like this:
```

Array
(
    [0] => Array
        (
            [contig] => Array
                (
                    [name] => ERS374227|SC|contig000001
                    [start] => 136
                    [end] => 267
                    [fragment] => TGGGAATTAGTAAAAGACTTCCTGCTGGTATCTCTGGGAATGGGATCGGCGTAGTCTTGATGTGTATTATGAGTGTCGGCAAAGAAGCTGACTATGAAATGAAACAATTAAAAGAAAGCGAGGACAATTAA
                )

            [attributes] => Array
                (
                    [0] => ID=11940_2#1_00001
                    [1] => inference=ab initio prediction:Prodigal:2.60,similar to AA sequence:RefSeq:YP_006200673.1,protein motif:Pfam:PF12664.1
                    [2] => locus_tag=11940_2#1_00001
                    [3] => product=conjugative transposon protein,Protein of unknown function (DUF3789)
                    [4] => protein_id=gnl|SC|11940_2#1_00001

                )

        )
```

